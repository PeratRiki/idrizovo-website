<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function security() { 
        return view('admin.security'); 
    }

    public function system() { 
        return view('admin.system'); 
    }
}