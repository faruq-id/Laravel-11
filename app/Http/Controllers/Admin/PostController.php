<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function postIndex()
    {
        $filters = request(['search', 'category', 'author']);
        $posts = Post::filter($filters)->latest()->paginate(10)->withQueryString(); //tampil dengan pagination paginate(9)/ simplePaginate(9)

        return view('dashboard.posts.posting', [
            'title' => 'Posts', 
            'postings' => $posts
        ]);
    }


    public function postShowFormAdd(Request $request) {

        // Ambil kategori untuk dropdown
        $categories = Category::all();

        return view('dashboard.posts.add-post', [
            'title' => 'Posts',
            'menu' => 'Post',
            'categories' => $categories, // Kirim data kategori ke view
        ]);
    }

    public function store(Request $request) 
    {
        //dd($request->all());
        // dd($request->input('author_id'));
        // try {
            // Jika slug tidak diisi, buat slug dari title
            $slug = Str::slug(iconv('UTF-8', 'ASCII//TRANSLIT', $request->input('title')));
            $request->merge(['slug' => $slug]);
    
            // Validasi data
            $validatedData = $request->validate([
                'title' => 'sometimes|required|string|max:255',
                'body' => 'required|string|max:65535',
                'category_id' => 'required|exists:categories,id',
                'slug' => "required|string|unique:posts,slug", // Pastikan slug unik, kecuali untuk post ini
                'author_id' => 'required|exists:users,id',
                'keywords' => 'required|string|max:255',
                'metadesc' => 'required|string|max:255',
                // 'image' => ['sometimes', 'required', 'file', 'image', 'mimes:jpg,jpeg,png', 'mimetypes:image/jpeg,image/png', 'max:1024'],
                'image' => [
                    'sometimes', // Hanya divalidasi jika ada
                    'required',  // Wajib diisi jika disertakan
                    'file',      // Harus berupa file
                    'image',     // File harus berupa gambar
                    'mimes:jpg,jpeg,png', // Format file harus jpg, jpeg, atau png
                    'mimetypes:image/jpeg,image/png', // Mimetypes diperbolehkan
                    'max:1024',  // Ukuran file maksimal 1MB
                ],
                'status' => 'required|in:0,1',
            ], [
                // Custom messages
                'title.required' => 'Judul wajib diisi.',
                'title.string' => 'Judul harus berupa teks.',
                'title.max' => 'Judul tidak boleh lebih dari 255 karakter.',

                'body.required' => 'Konten wajib diisi.',
                'body.string' => 'Konten harus berupa teks.',
                'body.max' => 'Konten tidak boleh lebih dari 65.535 karakter.',

                'category_id.required' => 'Kategori wajib dipilih.',
                'category_id.exists' => 'Kategori yang dipilih tidak valid.',

                'slug.required' => 'Slug wajib diisi.',
                'slug.string' => 'Slug harus berupa teks.',
                'slug.unique' => 'Slug sudah digunakan, gunakan yang lain.',

                'author_id.required' => 'Penulis wajib dipilih.',
                'author_id.exists' => 'Penulis yang dipilih tidak valid.',

                'keywords.required' => 'Kata kunci wajib diisi.',
                'keywords.string' => 'Kata kunci harus berupa teks.',
                'keywords.max' => 'Kata kunci tidak boleh lebih dari 255 karakter.',

                'metadesc.required' => 'Meta deskripsi wajib diisi.',
                'metadesc.string' => 'Meta deskripsi harus berupa teks.',
                'metadesc.max' => 'Meta deskripsi tidak boleh lebih dari 255 karakter.',

                'status.required' => 'Status wajib dipilih.',
                'status.in' => 'Status yang dipilih tidak valid. Pilih antara Active (1) atau Inactive (0).',


                // Pesan validasi untuk image
                'image.required' => 'Gambar wajib diunggah.',
                'image.file' => 'Gambar harus berupa file yang valid.',
                'image.image' => 'File yang diunggah harus berupa gambar.',
                'image.mimes' => 'Format gambar yang diizinkan adalah JPG, JPEG, dan PNG.',
                'image.mimetypes' => 'File harus berupa gambar dengan tipe MIME JPEG atau PNG.',
                'image.max' => 'Ukuran gambar tidak boleh lebih dari 1MB.',
            ]);

    
            if ($request->hasFile('image')) {
                // gunakan slug helper agar "nama" bisa dipakai sebagai bagian
                // dari nama gambar_profil
                $slug = $request->input('slug');
                // Ambil extensi file asli
                $extFile = $request->image->getClientOriginalExtension();
                // Generate nama gambar, gabungan dari slug "nama"+time()+extensi file
                $namaFile = "featured-".$slug . '-' . time() . "." . $extFile;
                // Proses upload, simpan ke dalam folder "uploads"
                // $path = $request->profile_picture->storeAs('public/users', $namaFile);
                $newFilePath = $request->image->storeAs('uploads/images/futured', $namaFile, 'public'); //storange/app/public/users
                // Debugging path
                // dd('File saved to: ' . $path);
                $validatedData['image'] = $newFilePath;
            }
            
            // Simpan data ke database
            $post = Post::create($validatedData);
    
            return redirect()->back()->with('success', 'Post saved successfully.');
        // } catch (ValidationException $e) {
        //     return redirect()->back()->withErrors($e->errors())->withInput();
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', $e->getMessage())->withInput();
        // }
    }


    public function postShowFormEdit($encryptedId)
    {
        // Dekripsi ID
        $id = Crypt::decrypt($encryptedId);

        // Ambil post berdasarkan ID
        $post = Post::findOrFail($id);

        // Ambil kategori untuk dropdown
        $categories = Category::all();

        return view('dashboard.posts.edit-post', [
            'title' => "Edit Post",
            'post' => $post,
            'categories' => $categories, // Kirim data kategori ke view
        ]);
    }

    public function update(Request $request, $encryptedId)
    {
        //dd($request);
        try {
            // Dekripsi ID
            $id = Crypt::decrypt($encryptedId);

            // Dekripsi author_id dari input
            $decryptedAuthorId = Crypt::decrypt($request->input('author_id'));
            $request->merge(['author_id' => $decryptedAuthorId]); // Ganti nilai author_id dengan hasil dekripsi

            // Jika slug tidak diisi, buat slug dari title
            if (!$request->has('slug')) {
                $request->merge(['slug' => Str::slug($request->input('title'))]);
            }

            // Validasi data
            $validatedData = $request->validate([
                'title' => 'sometimes|required|string|max:255',
                'body' => 'required|string|max:65535',
                'category_id' => 'nullable|exists:categories,id', // validasi kategori
                'slug' => "required|string|unique:posts,slug,$id", // Pastikan slug unik, kecuali untuk post ini
                'author_id' => 'required|exists:users,id', // Author harus ada di tabel users
                'status' => 'required|in:0,1', // Hanya nilai 0 atau 1 yang diperbolehkan
                'keywords' => 'nullable|string|max:255', // Kata kunci opsional
                'metadesc' => 'nullable|string|max:255', // Meta description opsional
                'image' => ['sometimes', 'required', 'file', 'image', 'mimes:jpg,jpeg,png', 'mimetypes:image/jpeg,image/png', 'max:1024'],
            ]);

            // Temukan post berdasarkan ID
            $post = Post::findOrFail($id);
            $oldFilePath = $post->image;

            // Update data pada model Post
            $post->fill($validatedData);

            // Cek jika tidak ada perubahan
            if ($post->isClean()) {
                return redirect()->back()->with('info', 'Tidak ada perubahan yang disimpan.');
            }

            if ($request->hasFile('image')) {
                // gunakan slug helper agar "nama" bisa dipakai sebagai bagian
                // dari nama gambar_profil
                $slug = Str::slug($request->title);
                // Ambil extensi file asli
                $extFile = $request->image->getClientOriginalExtension();
                // Generate nama gambar, gabungan dari slug "nama"+time()+extensi file
                $namaFile = "featured-".$slug . '-' . time() . "." . $extFile;
                // Proses upload, simpan ke dalam folder "uploads"
                
                // Simpan file baru
                $newFilePath = $request->image->storeAs('uploads/images/featured', $namaFile, 'public'); //storange/app/public/users
                // Debugging path
                if ($newFilePath) {
                    // Perbarui nama file yang akan disimpan ke database
                    $post->image = $newFilePath;
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
            $post->save();

            return redirect()->back()->with('success', 'Post berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


}
