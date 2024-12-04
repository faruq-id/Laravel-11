<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\QueryException;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // public static function middleware()
    // {
    //     return [
    //         'isLogin',
    //         new Middleware('isAdmin', only: ['index']), //Jika mau menerapkan hanya pada methode index
    //         //new Middleware('IsAdmin', except: ['index']), // jika mau menerapkan ke semua methode se lain index
    //     ];
    // }

    public function index()
    {
        $users =  User::latest()->paginate(10);
        
        $title['title'] = 'Users';
        $title['users'] = $users;
        return view('dashboard.users.users', $title);
    }

    public function store(Request $request) {
        //try {
            // Merge name field form (phone) ke name field db (phone_number)
            $request->merge([
                'phone_number' => $request->input('phone') // Column name phone_number ke no_hp
            ]);

            $validatedData = $request->validate([
                    'name' => 'required|alpha_spaces|max:61',
                    'username' => ['required', 'min:6', 'max:31', 'unique:users', 'regex:/^[a-zA-Z0-9._]+$/'],
                    'phone_number' => ['required', 'digits_between:10,15', 'unique:users'], //'no_hp' => ['required', 'regex:/^08\d{8,12}$/', 'unique:users'],
                    'email' => ['required', 'email:dns', 'max:255', 'unique:users'],
                    'password' => ['required', 'min:6', 'max:255', 'confirmed'],
                    'password_confirmation' => ['required', 'min:6', 'max:255'],
                    'status' => 'required|in:active,inactive',
                    'is_admin' => 'required|integer|in:0,1',
                    'profile_picture' => ['sometimes', 'required', 'file', 'image', 'mimes:jpg,jpeg,png', 'mimetypes:image/jpeg,image/png', 'max:1024'],
                    //'terms' => 'accepted' // Validasi checkbox terms harus dicentang
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
                ]
            );

        
            // $validatedData['password'] = bcrypt($validatedData['password']);
            $validatedData['password'] = Hash::make($validatedData['password']);

            // Add email_verified_at timestamp
            $validatedData['email_verified_at'] = now();

            // Tambahkan remember_token jika terms diterima
            // if ($request->has('terms')) {
            //     $validatedData['remember_token'] = Str::random(60);
            // }

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
            return redirect()->back()->with('success', 'Insert successful!');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    }

    public function update(Request $request, $encryptedId) {
        //try {
            // Dekripsi ID yang diterima
            $id = Crypt::decrypt($encryptedId);

            // Merge name field form (phone) ke name field db (phone_number)
            $request->merge([
                'phone_number' => $request->input('phone') // Column name phone_number ke no_hp
            ]);

            // Mengambil data dari request dan mengonversinya menjadi array
            $data = $request->all();

            // Validasi data
            $validatedData = Validator::make($data, [
                'name' => 'required|alpha_spaces|max:61',
                'email' => 'required|email:dns|max:255|unique:users,email,' . $id,
                'username' => 'nullable|string|min:6|max:31|unique:users,username,regex:/^[a-zA-Z0-9._]+$/' . $id,
                'phone_number' => 'nullable|string|digits_between:10,15|unique:users,phone_number,' . $id,
                'status' => 'required|in:active,inactive',
                'is_admin' => 'required|integer|in:0,1',
                'profile_picture' => ['sometimes', 'required', 'file', 'image', 'mimes:jpg,jpeg,png', 'mimetypes:image/jpeg,image/png', 'max:1024'],
                // 'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
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
            ]);

            // Jika validasi gagal, kirimkan error kembali ke form
            if ($validatedData->fails()) {
                // $errorMessages = implode(', ', $validatedData->errors()->all());
                // Menggabungkan pesan error dengan pemisah newline
                $errorMessages = implode(" | ", $validatedData->errors()->all());
                return redirect()->back()->with('error', $errorMessages)->withInput();
            }

            // Ambil data yang telah tervalidasi
            $validated = $validatedData->validated();

            // Ambil data user yang akan diupdate
            $user = User::findOrFail($id);
            $oldFilePath = $user->profile_picture;

            // Update hanya jika ada perubahan
            $user->fill($validated); // Isi data baru ke model, hanya data yang tervalidasi

            // Cek jika tidak ada perubahan
            if ($user->isClean()) {
                return redirect()->back()->with('info', 'Tidak ada perubahan yang disimpan.');
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
                
                // Simpan file baru
                $newFilePath = $request->profile_picture->storeAs('users', $namaFile, 'public'); //storange/app/public/users
                // Debugging path
                if ($newFilePath) {
                    // Perbarui nama file yang akan disimpan ke database
                    $user->profile_picture = $newFilePath;
                    // $user->save();
            
                    // Hapus file lama
                    if ($oldFilePath && Storage::disk('public')->exists($oldFilePath)) {
                        $deleted = Storage::disk('public')->delete($oldFilePath);
            
                        if (!$deleted) {
                            // Jika penghapusan file lama gagal, log pesan error
                            //Log::error("Gagal menghapus file lama: $oldFilePath");
                            return redirect()->back()->with('error', 'Gagal menghapus file lama.');
                        }
                    }
                } else {
                    // Jika file baru gagal diunggah
                    return redirect()->back()->with('error', 'Gagal mengunggah file baru.');
                }  
            } 

            

            // Simpan perubahan ke database
            $user->update(); //$user->save();
            return redirect()->back()->with('success', 'User ('. $user->name .') berhasil diperbarui!');
        // } catch (QueryException $e) {
        //     // Tangkap error duplicate entry
        //     if ($e->getCode() === '23000') { // Kode error MySQL untuk constraint violation
        //         return redirect()->back()->with(['error' => 'Nomor telepon sudah digunakan.']);
        //     }
    
        //     throw $e; // Lempar error jika bukan duplicate entry
        // }
    }

    public function destroy(Request $request, $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);

        // Cari data berdasarkan ID
        $user = User::findOrFail($id);

        
        // Cek apakah user memiliki post terkait, jegah peghapusan jika user masih memiliki data relasi
        if ($user->posts()->count() > 0) {
            return redirect()->back()->with('error', 'Gagal menghapus, pengguna ini masih memiliki post terkait.');
        }
        

        // Hapus semua post terkait (post) terlebih dahulu sebelum menghapus user
        //$user->posts()->delete();

        // Cek jika user memiliki profile_picture
        if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            // Hapus file profile_picture dari storage
            $deleted = Storage::disk('public')->delete($user->profile_picture);

            if (!$deleted) {
                return redirect()->back()->with('error', 'Gagal menghapus gambar profil.');
            }
        }

        // Hapus data
        $user->delete();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
