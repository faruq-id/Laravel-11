<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Pemetaan dari `phone_number` ke `no_hp` jika terdapat filed name dan form column name tidak sama
        // $request->merge([
        //     'profile_picture' => $request->input('gambar_profil') //colume name phone number ke no_hp
        // ]);

        $validatedData = $request->validate([
                'name' => 'required|alpha_spaces|max:61',
                'username' => ['required', 'min:6', 'max:31', 'unique:users', 'regex:/^[a-zA-Z0-9._]+$/'],
                'phone_number' => ['required', 'digits_between:10,15', 'unique:users'], //'no_hp' => ['required', 'regex:/^08\d{8,12}$/', 'unique:users'],
                'email' => ['required', 'email:dns', 'unique:users'],
                'password' => ['required', 'min:6', 'max:255', 'confirmed'],
                'password_confirmation' => ['required', 'min:6', 'max:255'],
                // 'profile_picture' => ['sometimes', 'nullable', 'file', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
                'profile_picture' => ['sometimes', 'required', 'file', 'image', 'mimes:jpg,jpeg,png', 'mimetypes:image/jpeg,image/png', 'max:1024'],
                'terms' => 'accepted' // Validasi checkbox terms harus dicentang
            ], [
                'name.alpha_spaces' => 'The attribute field may only contain letters and spaces.', //'Nama hanya boleh berisi huruf dan spasi.',
                'username.regex' => 'The username field format is invalid. (a-z, A-Z, 0-9, ., _)',
                // 'username.required' => 'Username wajib diisi.',
                // 'username.unique' => 'Username sudah digunakan.',
                // 'no_hp.required' => 'Nomor Handphone wajib diisi.',
                // 'no_hp.unique' => 'Nomor Handphone sudah digunakan.',
                // 'email.required' => 'Email wajib diisi.',
                // 'email.email' => 'Email tidak valid.',
                // 'password.required' => 'Password wajib diisi.',
                // 'password.confirmed' => 'Konfirmasi password tidak cocok.',
                //'terms.accepted' => 'You must accept the Terms and Conditions.',
                //'phone_number.digits_between' => 'Panjang no telepon 10-15'
            ]
        );

        try {
            // $validatedData['password'] = bcrypt($validatedData['password']);
            $validatedData['password'] = Hash::make($validatedData['password']);

            // Add email_verified_at timestamp
            $validatedData['email_verified_at'] = now();

            // Tambahkan remember_token jika terms diterima
            if ($request->has('terms')) {
                $validatedData['remember_token'] = Str::random(60);
            }

            if ($request->hasFile('profile_picture')) {
                // gunakan slug helper agar "nama" bisa dipakai sebagai bagian
                // dari nama gambar_profil
                $slug = Str::slug($request->name);
                // Ambil extensi file asli
                $extFile = $request->profile_picture->getClientOriginalExtension();
                // Generate nama gambar, gabungan dari slug "nama"+time()+extensi file
                $namaFile = $slug . '-' . time() . "." . $extFile;
                // Proses upload, simpan ke dalam folder "uploads"
                // $path = $request->profile_picture->storeAs('public/users', $namaFile);
                $newFilePath = $request->profile_picture->storeAs('users', $namaFile, 'public'); //storange/app/public/users
                // Debugging path
                // dd('File saved to: ' . $path);
                $validatedData['profile_picture'] = $newFilePath;
            } 

            User::create($validatedData);

            //$request->session()->flash('success', 'Registration successful!');
            return redirect('/login')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
