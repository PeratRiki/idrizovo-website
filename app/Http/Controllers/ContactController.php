<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'            => 'required|string|max:120',
            'email'           => 'required|email|max:120',
            'prisoner_number' => 'nullable|string|max:80',
            'message'         => 'required|string|min:10',
        ]);

        $content = $data['message'];
        if (!empty($data['prisoner_number'])) {
            $content = "[Затворенички број: {$data['prisoner_number']}]
" . $content;
        }

        ContactMessage::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'subject'  => 'Contact form message',
            'message'  => $content,
            'priority' => 'normal',
            'is_read'  => false,
        ]);

        return back()->with('success', 'Вашата порака е испратена.');
    }
}
