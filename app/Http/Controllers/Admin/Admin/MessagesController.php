<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->email === 'vospituvac@idrizovo.com') {
                abort(403);
            }
            return $next($request);
        });
    }
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.messages', compact('messages'));
    }

    public function markAsRead(ContactMessage $message)
    {
        $message->update(['is_read' => true]);
        return back()->with('success', 'Порака означена како прочитана!');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return back()->with('success', 'Пораката е избришана!');
    }
}