<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

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

    // Alias за route('admin.messages.send') — го повикува store()
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

        $message->update([
            'reply'      => $request->reply,
            'replied_at' => now(),
            'is_read'    => true,
        ]);

        return back()->with('success', 'Одговорот е зачуван успешно!');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return back()->with('success', 'Пораката е избришана!');
    }
}