<?php

namespace App\Http\Controllers\Root;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Helpers\PageTitleHelper;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function blogIndex() 
    {
        $filters = request(['search', 'category', 'author']);
        $posts = Post::filter($filters)->latest()->paginate(12)->withQueryString();
        $title = PageTitleHelper::getPageTitle($filters); // Menggunakan helper PageTitleHelper

        return view('root.blog.posts', [
            'title' => $title,
            'posts' => $posts,
        ]);
    }

    public function blogDetail(Post $post)
    {
        return view('root.blog.post', [
            'title' => $post->title,
            'post' => $post,
        ]);
    }
}
