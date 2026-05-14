<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if ($request->username === 'admin') {
            $user = \App\Models\User::first();
            
            if ($user && \Hash::check($request->password, $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }
        }

        return back()->withErrors(['username' => 'Погрешно корисничко име или лозинка.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}