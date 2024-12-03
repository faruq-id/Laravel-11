<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\LoginNotification;

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
            $user = Auth::user();
            $user->update(['last_login_at' => now()]);

            // Kirim notifikasi login
            $user->notify(new LoginNotification($user));

                return redirect()->intended('/dashboard')->with('success', 'Selamat datang ' . Auth::user()->name);
            }

        return back()->with('error', 'Login failed!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
