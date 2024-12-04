<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(10),
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => Str::slug(fake()->sentence(10)),
            //'body'  => fake()->text(),
            // 'body' => implode("\n\n", fake()->paragraphs(5)), //Beberapa Paragraf
            // 'body' => implode(' ', fake()->sentences(25)), //Teks Panjang Tanpa Paragraf
            // 'body' => "<h2>" . fake()->sentence() . "</h2>\n\n" .
            //             implode("\n\n", fake()->paragraphs(7)) . "\n\n" .
            //             "<h3>" . fake()->sentence() . "</h3>\n\n" .
            //             implode("\n\n", fake()->paragraphs(3)), //Menggabungkan Paragraf dan Heading
            'body' => "<h3>" . fake()->sentence() . "</h3>\n\n" . // Heading level 2
                        implode("\n\n", array_map(fn() => "<p>" . fake()->paragraph() . "</p>", fake()->paragraphs(3))) . "\n\n" . // 3 paragraphs
                        "<h3>" . fake()->sentence() . "</h3>\n\n" . // Heading level 3
                        implode("\n\n", array_map(fn() => "<p>" . fake()->paragraph() . "</p>", fake()->paragraphs(2))) . "\n\n" . // 2 paragraphs
                        "<h3>" . fake()->sentence() . "</h3>\n\n" . // Heading level 3
                        implode("\n\n", array_map(fn() => "<p>" . fake()->paragraph() . "</p>", fake()->paragraphs(2)))  . "\n\n" .// 2 paragraphs
                        "<h3>" . fake()->sentence() . "</h3>\n\n" . // Heading level 3
                        implode("\n\n", array_map(fn() => "<p>" . fake()->paragraph() . "</p>", fake()->paragraphs(2)))  . "\n\n" .// 2 paragraphs
                        "<h3>" . fake()->sentence() . "</h3>\n\n" . // Heading level 3
                        implode("\n\n", array_map(fn() => "<p>" . fake()->paragraph() . "</p>", fake()->paragraphs(2)))  . "\n\n" .// 2 paragraphs
                        "<h3>" . fake()->sentence() . "</h3>\n\n" . // Heading level 3
                        implode("\n\n", array_map(fn() => "<p>" . fake()->paragraph() . "</p>", fake()->paragraphs(2))),  // 2 paragraphs
            'image' => fake()->imageUrl(640, 480, 'posts', true, 'Faker'), // Random image URL
            'keywords' => fake()->words(3, true), // Random keywords
            'metadesc' => fake()->sentence(10), // Random meta description
        ];
    }
}
