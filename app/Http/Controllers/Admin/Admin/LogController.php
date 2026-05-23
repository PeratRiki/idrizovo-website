<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;

class LogController extends Controller
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
    public function security()
    {
        return view('admin.security');
    }

    public function system()
    {
        return view('admin.system');
    }
}