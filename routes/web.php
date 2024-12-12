<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Root\BlogController;
use App\Http\Controllers\Root\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\ImageTextEditorUploadController;

// ROUTE PAGES
// Route::get('/', function () {
//     return view('root.home', ['title' => 'Home']);
// })->name('home.home');

Route::get('/', [HomeController::class, 'index'])->name('home.home');
Route::get('/services', [HomeController::class, 'serviceIndex'])->name('home.services');
Route::get('/about', [HomeController::class, 'aboutIndex'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contactIndex'])->name('home.contact');

// ROUTE BLOG
Route::group(['prefix' => '/blog', 'as' => 'blog.'], function () {
    // Rute untuk halaman blog utama
    Route::get('/', [BlogController::class, 'blogIndex'])->name('index');
    // Rute untuk halaman detail post
    Route::get('/{post:slug}', [BlogController::class, 'blogDetail'])->name('detail');
});


// ROUTE AUTH
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'register'])->name('auth.register');
    Route::post('/register', [RegisterController::class, 'store'])->name('auth.register.proses');
    Route::get('/login', [LoginController::class, 'login'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login.proses');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('auth.forgot.pasword');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('auth.forgot.pasword.verify');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

// Route::get('/dashboard', function () {
//     return view('dashboard.index', ['title' => 'Dashboard']);
// })->middleware('isLogin');

// Route::middleware(['isLogin'])->group(function () {
//     Route::get('/profile', function () {
//         return view('dashboard.profile', ['title' => 'Profile']);
//     });
// });


// Route::get('/users', function () {
//     // $post =  Post::latest()->get();
//     // return view('dashboard.posting', ['title' => 'Post',  'postings' => $post]);

//     //$categorys = Category::filter(request(['search', 'category', 'author']))->latest()->paginate(10)->withQueryString(); //tampil dengan pagination paginate(9)/ simplePaginate(9)
//     $users =  User::latest()->paginate(10);
//     return view('dashboard.users.users', ['title' => 'Users', 'users' => $users]);
// })->middleware('isAdmin');

// Route::group(['prefix' => 'api', 'middleware' => 'isLogin'], function() {
Route::group(['middleware' => 'isLogin', 'as' => 'admin.'], function() {
    Route::get('/testing', function() {
        dd('test');
        //return "Test";
    });

    Route::get('/profile', function () {
        return view('dashboard.profile', ['title' => 'Profile']);
    })->name('profile.index');

    Route::get('/dashboard', function () {
        return view('dashboard.index', ['title' => 'Dashboard']);
    })->name('dashboard.index');

    Route::group(['middleware' => 'isAdmin'], function()
    {
        // ROUT TEXT EDITOR
        Route::post('/tinydrive/local-upload-image', [ImageTextEditorUploadController::class, 'store'])->name('local.upload.text.editor');
        Route::post('/tinydrive/token',  [ImageTextEditorUploadController::class, 'generateTokenTinyDriveMce'])->name('upload.tinydrive');
        Route::get('/files', function () {
            $directory = 'uploads/images/editor';
            $files = Storage::disk('public')->files($directory);

            if (empty($files)) {
                return response()->json(['error' => 'No files found'], 404);
            }

            $fileList = array_map(function ($file) {
                return [
                    'title' => basename($file), // Nama file
                    'value' => asset(Storage::url($file)), // URL lengkap
                ];
            }, $files);

            return response()->json($fileList);
        });

        // POSTS ROUTE
        Route::get('/post', [PostController::class, 'postIndex'])->name('posts.index');
        Route::get('/post/create', [PostController::class, 'postShowFormAdd'])->name('posts.add');
        Route::post('/post/store', [PostController::class, 'store'])->name('posts.store');
        Route::get('/post/{id}', [PostController::class, 'postShowFormEdit'])->name('posts.edit');
        Route::put('/post/{post}', [PostController::class, 'update'])->name('posts.update');
        // Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

        // USERS ROUTE
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', [UserController::class, 'index'])->name('users.index');
            //Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
            Route::post('/', [UserController::class, 'store'])->name('users.add');
            Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        });
        
        Route::get('/category', function () {
            $categorys =  Category::latest()->paginate(5);
            return view('dashboard.category', ['title' => 'Category', 'categorys' => $categorys]);
        })->name('category.index');
    });
});

// // Rute untuk blog oleh author
// Route::get('/authors/{user:username}', function (User $user) {
//     return view('posts', [
//         'title' => count($user->posts) . ' Post by: ' . $user->name,
//         'posts' => $user->posts,
//     ]);
// })->name('author');

// // Rute untuk blog perkategori
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => count($category->posts) . ' Category: ' . $category->name,
//         'posts' => $category->posts,
//     ]);
// })->name('category');




// // Route::get('/posts', function () {
// Route::get('/blog', function () {
//     //JIKA HANYA MENAMPILKAN POST TANPA GABUNG DENGAN PENCARIAN
//     //$posts =  Post::all(); lazy loading
//     //$posts =  Post::latest()->get(); //menampilkan biasa
//     //$posts =  Post::with('author')->latest()->get(); //eager loading
//     // $posts =  Post::with(['author', 'category'])->latest()->get(); //eager loading
//     // return view('posts', ['title' => 'Blog', 'posts' => $posts]);
//     //return view('posts', ['title' => 'Blog', 'posts' => $posts]);

//     //UNTUK INI MENAMPILKAN SAMUA POST DAN JIKA VARIABEL NAME DARI FORM SEARCH ADA ISINYA MAKA TAMPILKAN SESUAI REQUET PENCARIAN 
//     // (sederhana dan ada masalah ketika masuk ke halaman kategory, hanya bisa pencarian di halaman blog)
//     // $posts =  Post::latest();

//     // if(request('search')) {
//     //     $posts->where('title', 'like', '%' . request('search') . '%');
//     // }

//     // return view('posts', ['title' => 'Blog', 'posts' => $posts->get()]);

//     //cara penambahan search yang lebih komplite
//     // $posts = Post::filter(request(['search', 'category', 'author']))->latest()->get(); //tampil semua data
//     // $posts = Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString(); //tampil dengan pagination paginate(9)/ simplePaginate(9)
//     // return view('posts', ['title' => 'Blogs', 'posts' => $posts]);

//     $filters = request(['search', 'category', 'author']);
//     $posts = Post::filter($filters)->latest()->paginate(12)->withQueryString();
//     $title = PageTitleHelper::getPageTitle($filters); //menggunakan helpers PageTitleHelper

//     return view('posts', [
//         'title' => $title, 
//         'posts' => $posts]
//     );
// });

// // Route  dengan tambahan posts sebelum slug url atikel
// Route::get('/blog/{post:slug}', function(Post $post){
//     return view('post', [
//         'title' => $post->title, 
//         'post' => $post,
//     ]);
// });


// Route::get('/authors/{user:username}', function(User $user){
//     // $posts = $user->posts->load('category', 'author'); //lazy eger loading
//     // return view('posts', [
//     //     'title' => count($posts) . ' Post by: '.$user->name, 
//     //     'posts' => $posts
//     // ]);

//     return view('posts', [
//         'title' => count($user->posts) . ' Post by: '.$user->name, 
//         'posts' => $user->posts
//     ]);
// });

// Route::get('/categories/{category:slug}', function(Category $category){
//     // $posts = $category->posts->load('category', 'author'); //lazy eger loading

//     // return view('posts', [
//     //     'title' => count($posts) . ' Category: '.$category->name, 
//     //     'posts' => $posts
//     // ]);

//     return view('posts', [
//         'title' => count($category->posts) . ' Category: '.$category->name, 
//         'posts' => $category->posts
//     ]);
// });



//agar konflik dapat dihindari maka route untuk detail artikel tanpa awalan posts harus ada di paling bawah
// Route::get('/{post:slug}', function ($slug) {
//     $post = Post::where('slug', $slug)->firstOrFail();

//     return view('post', [
//         'title' => $post->title,
//         'post' => $post,
//     ]);
// })->where('slug', '^(?!about|contact|other-page$).*');

