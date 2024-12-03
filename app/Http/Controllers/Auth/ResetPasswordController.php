<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Notifications\CustomResetPasswordNotification;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        // return view('auth.forgot-password', ['title' => 'Forgot Password']);
        // dd($request);

        $data['title'] = 'Reset Password';
        $data['token'] = $token;
        $data['email'] = $request->email;
        return view('auth.reset-password', $data);
    }

    public function reset(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();

                // Kirim notifikasi
                $user->notify(new CustomResetPasswordNotification());
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('auth.login')->with('success', __($status))
            : back()->withErrors(['error' => __($status)]);
    }
}
