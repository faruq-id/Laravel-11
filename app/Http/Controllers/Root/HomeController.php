<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil App Name dari konfigurasi
        $appName = config('app.name');

        // return view('root.home', ['title' => 'SIAKAD']);
        $data['title'] = $appName;
        return view('root.home', $data);
    }

    public function aboutIndex()
    {
        $data['title'] = 'About';
        return view('root.pages.about', $data);
    }

    public function serviceIndex()
    {
        $data['title'] = 'Services';
        return view('root.pages.services', $data);
    }

    public function contactIndex() 
    {
        // $data['nav'] = [
        //     ['name' => 'Home', 'link' => route('home.home'), 'active' => Request::is('/')],
        //     ['name' => 'About', 'link' => route('home.about'), 'active' => Request::is('about')],
        //     ['name' => 'Services', 'link' => route('home.services'), 'active' => Request::is('services')],
        //     ['name' => 'Blog', 'link' => route('blog.index'), 'active' => Request::is('blog')],
        //     ['name' => 'Contact', 'link' => route('home.contact'), 'active' => Request::is('contact')],
        // ];
        $data['title'] = 'Contact';
        return view('root.pages.contact', $data);
    }
}
