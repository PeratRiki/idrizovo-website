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

        // Ова е за проверка со фиксни податоци (admin / admin123)
        if ($request->username === 'admin' && $request->password === 'admin123') {
            // Рачно најавување на првиот корисник од базата (осигурај се дека имаш барем еден во 'users' табелата)
            $user = \App\Models\User::first();
            Auth::login($user);
            return redirect()->intended('/admin');
        }

        return back()->withErrors(['username' => 'Погрешно корисничко име или лозинка.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}