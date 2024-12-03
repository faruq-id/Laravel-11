<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        // return view('auth.forgot-password', ['title' => 'Forgot Password']);

        $data['title'] = 'Forgot your Password';
        return view('auth.forgot-password', $data);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $validatedData = $request->validate([
                'email' => 'required|email|email:dns|exists:users,email', // validasi email dan cek apakah email ada di tabel users
            ]
        );

        //$user = User::findOrFail($request->email);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        $status = Password::sendResetLink([
            'email' => $user->email,
        ]);

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', __($status))
            : back()->withErrors(['error' => __($status)]);

        //dd($user->email);

        return back()->with('error', 'Request failed!');
    }
}
