<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use App\Http\Middleware\AdminAccess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/posts', function () {
    //JIKA HANYA MENAMPILKAN POST TANPA GABUNG DENGAN PENCARIAN
    //$posts =  Post::all(); lazy loading
    //$posts =  Post::latest()->get(); //menampilkan biasa
    //$posts =  Post::with('author')->latest()->get(); //eager loading
    // $posts =  Post::with(['author', 'category'])->latest()->get(); //eager loading
    // return view('posts', ['title' => 'Blog', 'posts' => $posts]);
    //return view('posts', ['title' => 'Blog', 'posts' => $posts]);

    //UNTUK INI MENAMPILKAN SAMUA POST DAN JIKA VARIABEL NAME DARI FORM SEARCH ADA ISINYA MAKA TAMPILKAN SESUAI REQUET PENCARIAN 
    // (sederhana dan ada masalah ketika masuk ke halaman kategory, hanya bisa pencarian di halaman blog)
    // $posts =  Post::latest();

    // if(request('search')) {
    //     $posts->where('title', 'like', '%' . request('search') . '%');
    // }

    // return view('posts', ['title' => 'Blog', 'posts' => $posts->get()]);

    //cara penambahan search yang lebih komplite
    if(request('search') && request('category')) {
        $category = Category::where('slug', request('category'))->first();
        $titlesearch = $category ? 'Category: ' . $category->name . ' / Search : ' . request('search') : 'Category: Tidak Ditemukan';
    } else if(request('category')) {
        $category = Category::where('slug', request('category'))->first();
        $titlesearch = $category ? count($category->posts) . ' Category: ' . $category->name : 'Category: Tidak Ditemukan';
    } else if(request('search') && request('author')) {
        $author = User::where('username', request('author'))->first();
        $titlesearch = 'Post by: ' . $author->name . ' / Search : ' . request('search');
    } else if(request('author')) {
        $author = User::where('username', request('author'))->first();
        $titlesearch = count($author->posts) . ' Post by: ' . $author->name;
    } else if(request('search')) {
        $titlesearch = 'Search results from: ' . request('search');
    } else {
        $titlesearch = 'Blogs';
    }

    // $posts = Post::filter(request(['search', 'category', 'author']))->latest()->get(); //tampil semua data
    $posts = Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString(); //tampil dengan pagination paginate(9)/ simplePaginate(9)
    return view('posts', ['title' => $titlesearch, 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function(Post $post){
    return view('post', [
        'title' => 'Blog / ' . $post->title, 'post' => $post
    ]);
});

Route::get('/authors/{user:username}', function(User $user){
    // $posts = $user->posts->load('category', 'author'); //lazy eger loading
    // return view('posts', [
    //     'title' => count($posts) . ' Post by: '.$user->name, 
    //     'posts' => $posts
    // ]);

    return view('posts', [
        'title' => count($user->posts) . ' Post by: '.$user->name, 
        'posts' => $user->posts
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    // $posts = $category->posts->load('category', 'author'); //lazy eger loading

    // return view('posts', [
    //     'title' => count($posts) . ' Category: '.$category->name, 
    //     'posts' => $posts
    // ]);

    return view('posts', [
        'title' => count($category->posts) . ' Category: '.$category->name, 
        'posts' => $category->posts
    ]);
});

Route::get('/services', function () {
    return view('services', ['title' => 'Services']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Miftahul Faruq', 'title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

// Route::get('/register', function () {
//     return view('register.register', ['title' => 'Register']);
// });
Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/login', function () {
//     return view('login.login', ['title' => 'Login']);
// });
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard.index', ['title' => 'Dashboard']);
})->middleware('auth');

Route::get('/profile', function () {
    return view('dashboard.profile', ['title' => 'Profile']);
})->middleware('auth');

Route::get('/posting', function () {
    // $post =  Post::latest()->get();
    // return view('dashboard.posting', ['title' => 'Post',  'postings' => $post]);

    $posts = Post::filter(request(['search', 'category', 'author']))->latest()->paginate(10)->withQueryString(); //tampil dengan pagination paginate(9)/ simplePaginate(9)
    return view('dashboard.posting', ['title' => 'Posts', 'postings' => $posts]);
})->middleware('isAdmin');

Route::get('/category', function () {
    // $post =  Post::latest()->get();
    // return view('dashboard.posting', ['title' => 'Post',  'postings' => $post]);

    //$categorys = Category::filter(request(['search', 'category', 'author']))->latest()->paginate(10)->withQueryString(); //tampil dengan pagination paginate(9)/ simplePaginate(9)
    $categorys =  Category::latest()->paginate(5);
    return view('dashboard.category', ['title' => 'Category', 'categorys' => $categorys]);
})->middleware('isAdmin');



