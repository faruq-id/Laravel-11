<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $userfaruq = User::create([
        //     'name' => 'Miftahul Faruq',
        //     'username' => 'faroeq.id',
        //     'email' => 'faruq@uim.ac.id',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10)
        // ]);

        // Category::create([
        //     'name' => 'Berita Terbaru',
        //     'slug' => 'berita-terbaru'
        // ]);

        // Post::create([
        //     'title' => 'Judul Post 1',
        //     'slug' => 'judul-post-1',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'body' => 'test isi post dari judul pst 1'
        // ]);


        //cara 1 di gabung di sini tanpa membuat seeder per model
        // Post::factory(30)->recycle([
        //     Category::factory(5)->create(),
        //     $userfaruq, // memasukkan user yang di buat sendiri ke dalam author_id
        //     User::factory(3)->create()
        // ])->create();



        //cara 2 dalah dengan seeder model terpisah
        $this->call([CategorySeeder::class, UserSeeder::class]);
        Post::factory(100)->recycle([
            
            Category::all(),
            User::all()
            
        ])->create();
    }
}
