<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function security()
    {
        if (auth()->user()->email === 'vospituvac@idrizovo.com') {
            abort(403);
        }

        return view('admin.security');
    }

    public function system()
    {
        if (auth()->user()->email === 'vospituvac@idrizovo.com') {
            abort(403);
        }

        return view('admin.system');
    }
}