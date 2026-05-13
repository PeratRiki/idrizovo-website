<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessagesController extends Controller 
{
    public function index()
    {
        $messages = collect([]);

        return view('admin.messages', compact('messages'));
    }
}