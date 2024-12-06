<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

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

    public function postDetail($encryptedId)
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
        // dd($request);
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
                'body' => 'required|string',
                'category_id' => 'nullable|exists:categories,id', // validasi kategori
                'slug' => "required|string|unique:posts,slug,$id", // Pastikan slug unik, kecuali untuk post ini
                'author_id' => 'required|exists:users,id', // Author harus ada di tabel users
                'status' => 'required|in:0,1', // Hanya nilai 0 atau 1 yang diperbolehkan
                'keywords' => 'nullable|string|max:255', // Kata kunci opsional
                'metadesc' => 'nullable|string|max:255', // Meta description opsional
            ]);

            // Temukan post berdasarkan ID
            $post = Post::findOrFail($id);

            // Update data pada model Post
            $post->fill($validatedData);

            // Cek jika tidak ada perubahan
            if ($post->isClean()) {
                return redirect()->back()->with('info', 'Tidak ada perubahan yang disimpan.');
            }

            // Simpan perubahan ke database
            $post->save();

            return redirect()->back()->with('success', 'Post berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


}
