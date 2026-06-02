<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminMessage;
use App\Models\ContactMessage;
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

        $messages = ContactMessage::latest()->get();

        if (in_array($role, ['email_reader', 'vospituvac'])) {
            return view('admin.email-reader', compact('messages'));
        }

        return view('admin.messages', compact('messages'));
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

        $message->update([
            'is_read'    => true,
            'reply'      => $request->reply,
            'replied_at' => now(),
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'message'    => 'Одговорот е испратен успешно!',
                'reply'      => $request->reply,
                'replied_at' => now()->format('d.m.Y H:i'),
            ]);
        }

        return back()->with('success', 'Одговорот е испратен успешно!');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return back()->with('success', 'Пораката е избришана!');
    }
}