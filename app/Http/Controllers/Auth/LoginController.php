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

        // Проверка со твоите фиксни податоци
        if ($request->username === 'admin' && $request->password === 'admin123') {
            $user = \App\Models\User::first();
            
            if ($user) {
                Auth::login($user);
                // Регенерирање на сесијата по успешно најавување (заштита од Session Fixation)
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }
        }

        return back()->withErrors(['username' => 'Погрешно корисничко име или лозинка.']);
    }

    /**
     * Професионален Logout метод
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // 1. Ја поништува сесијата на корисникот
        $request->session()->invalidate();

        // 2. Го регенерира CSRF токенот (превенција од напади)
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}