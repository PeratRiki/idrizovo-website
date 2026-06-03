<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminMessage;
use App\Models\ContactMessage;
use App\Models\ContactMessageThread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        if (!in_array($role, ['admin', 'email_reader', 'vospituvac'])) {
            abort(403);
        }

        $messages = ContactMessage::select(['id', 'name', 'email', 'subject', 'message', 'priority', 'is_read', 'reply', 'created_at'])
            ->latest()
            ->paginate(50);

        $total   = ContactMessage::count();
        $unread  = ContactMessage::where('is_read', false)->count();
        $replied = ContactMessage::whereNotNull('reply')->count();
        $urgent  = ContactMessage::where('priority', 'urgent')->count();

        if (in_array($role, ['email_reader', 'vospituvac'])) {
            return view('admin.email-reader', compact('messages', 'total', 'unread', 'replied', 'urgent'));
        }

        return view('admin.messages', compact('messages', 'total', 'unread', 'replied', 'urgent'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'to'       => 'required|email',
            'subject'  => 'required|string|max:255',
            'message'  => 'required|string|min:5',
            'priority' => 'in:urgent,normal,low',
        ]);

        Mail::to($request->to)->send(new AdminMessage($request->subject, $request->message));

        ContactMessage::create([
            'name'     => auth()->user()->name,
            'email'    => $request->to,
            'subject'  => $request->subject,
            'message'  => $request->message,
            'priority' => $request->priority ?? 'normal',
            'is_read'  => true,
        ]);

        return back()->with('success', 'Мејлот е испратен успешно!');
    }

    public function send(Request $request)
    {
        return $this->store($request);
    }

    public function markAsRead(ContactMessage $message)
    {
        $message->update(['is_read' => true]);
        return back()->with('success', 'Порака означена како прочитана!');
    }

    public function reply(Request $request, ContactMessage $message)
    {
        $request->validate([
            'reply' => 'required|string|min:5',
        ]);

        Mail::to($message->email)->send(new AdminMessage('Re: ' . ($message->subject ?? 'Одговор'), $request->reply));

        $thread = ContactMessageThread::create([
            'contact_message_id' => $message->id,
            'sender'             => 'admin',
            'message'            => $request->reply,
        ]);

        $message->update(['is_read' => true]);

        if ($request->expectsJson()) {
            return response()->json([
                'message'    => 'Одговорот е испратен успешно!',
                'reply'      => $thread->message,
                'replied_at' => $thread->created_at->format('d.m.Y H:i'),
            ]);
        }

        return back()->with('success', 'Одговорот е испратен успешно!');
    }

    public function thread(ContactMessage $message)
    {
        $message->load('threads');

        $conversation = [];
        $conversation[] = [
            'sender'     => 'sender',
            'name'       => $message->name,
            'email'      => $message->email,
            'message'    => $message->message,
            'created_at' => $message->created_at->format('d.m.Y H:i'),
        ];

        foreach ($message->threads as $thread) {
            $conversation[] = [
                'sender'     => $thread->sender,
                'message'    => $thread->message,
                'created_at' => $thread->created_at->format('d.m.Y H:i'),
            ];
        }

        return response()->json([
            'subject'      => $message->subject,
            'name'         => $message->name,
            'email'        => $message->email,
            'created_at'   => $message->created_at->format('d.m.Y H:i'),
            'conversation' => $conversation,
        ]);
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return back()->with('success', 'Пораката е избришана!');
    }
}