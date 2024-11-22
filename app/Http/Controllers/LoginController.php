<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);


        if(Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            // Update last_login_at dengan waktu sekarang
            Auth::user()->update(['last_login_at' => now()]);

            return redirect()->intended('/dashboard')->with('success', 'Selamat datang ' . Auth::user()->name);
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
