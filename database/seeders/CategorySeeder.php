<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(5)->create();

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color' => 'red'
        ]);
        Category::create([
            'name' => 'UI UX',
            'slug' => 'ui-ux',
            'color' => 'green'
        ]);
        Category::create([
            'name' => 'Python',
            'slug' => 'python',
            'color' => 'yellow'
        ]);
        Category::create([
            'name' => 'Backend Developer',
            'slug' => 'be',
            'color' => 'blue'
        ]);
        Category::create([
            'name' => 'Frontend Developer',
            'slug' => 'fe',
            'color' => 'orange'
        ]);

        // $categories = ["Web Design", "UI UX", "Machine Learning", "Backend Developer", "Frontend Developer"];

        // foreach ($categories as $name) {
        //     Category::create([
        //         'name' => $name,
        //         'slug' => Str::slug($name),
        //         'color' => 'red'
        //     ]);
        // }
    }
}
