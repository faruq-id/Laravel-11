<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
                'name' => 'required|alpha_spaces|max:61',
                'username' => ['required', 'min:4', 'max:31', 'unique:users'],
                'email' => ['required', 'email:dns', 'unique:users'],
                'password' => ['required', 'min:6', 'max:255', 'confirmed'],
                'terms' => 'accepted' // Validasi checkbox terms harus dicentang
            ], [
                'name.alpha_spaces' => 'The attribute field may only contain letters and spaces.', //'Nama hanya boleh berisi huruf dan spasi.',
                // 'username.required' => 'Username wajib diisi.',
                // 'username.unique' => 'Username sudah digunakan.',
                // 'email.required' => 'Email wajib diisi.',
                // 'email.email' => 'Email tidak valid.',
                // 'password.required' => 'Password wajib diisi.',
                // 'password.confirmed' => 'Konfirmasi password tidak cocok.',
                //'terms.accepted' => 'You must accept the Terms and Conditions.',
            ]
        );

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Add email_verified_at timestamp
        $validatedData['email_verified_at'] = now();

        // Tambahkan remember_token jika terms diterima
        if ($request->has('terms')) {
            $validatedData['remember_token'] = Str::random(60);
        }

        User::create($validatedData);

        //$request->session()->flash('success', 'Registration successful!');
        return redirect('/login')->with('success', 'Registration successful!');
    }
}
