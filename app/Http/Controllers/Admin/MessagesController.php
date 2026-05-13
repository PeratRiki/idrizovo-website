<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Мора да биде MessagesController (со S) за да се совпаѓа со името на фајлот
class MessagesController extends Controller 
{
    public function index()
    {
        return view('admin.messages');
    }
}