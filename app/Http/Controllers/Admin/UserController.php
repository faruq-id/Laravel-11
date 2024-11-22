<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users =  User::latest()->paginate(10);
        
        $title['title'] = 'Users';
        $title['users'] = $users;
        return view('dashboard.users.users', $title);
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
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $id,
                'username' => 'nullable|string|max:255|unique:users,username,' . $id,
                'phone_number' => 'nullable|string|max:15|unique:users,phone_number,' . $id,
                'is_admin' => 'required|integer|in:0,1',
                'profile_picture' => ['sometimes', 'required', 'file', 'image', 'mimes:jpg,jpeg,png', 'mimetypes:image/jpeg,image/png', 'max:1024'],
                // 'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
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
                // Hapus file lama jika ada
                if ($oldFilePath) {
                    if (Storage::disk('public')->exists($oldFilePath)) {
                        $deleted = Storage::disk('public')->delete($oldFilePath);

                        if (!$deleted) {
                            dd("Gagal menghapus file lama: $oldFilePath");
                        }
                    } else {
                        dd("test ".$oldFilePath);
                    }
                }

                // gunakan slug helper agar "nama" bisa dipakai sebagai bagian
                // dari nama gambar_profil
                $slug = Str::slug($request->name);
                // Ambil extensi file asli
                $extFile = $request->profile_picture->getClientOriginalExtension();
                // Generate nama gambar, gabungan dari slug "nama"+time()+extensi file
                $namaFile = $slug . '-' . time() . "." . $extFile;
                // Proses upload, simpan ke dalam folder "uploads"
                
                // Simpan file baru
                $path = $request->profile_picture->storeAs('users', $namaFile, 'public'); //storange/app/public/users
                // Debugging path
                // dd('File saved to: ' . $path);

                // Gabungkan path storage dengan nama file untuk penyimpanan di database
                $fullPath = $path; // Contoh: "storage/users/nama-file.jpg"

                // Tambahkan gambar ke data tervalidasi
                // Perbarui nama file yang akan disimpan ke database
                $user->profile_picture = $fullPath;
            } 
            // else {
            //     // jika user tidak mengupload gambar, isi dengan gambar default
            //     $fullPath = null;
            // }

            

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
}
