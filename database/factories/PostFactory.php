<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Profile;
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
            'profile_id' => Profile::first()->id,
            'title' => fake()->realTextBetween(20, 150),
            'category_id' => Category::inRandomOrder()->first()->id,
            'image_path' => fake()->imageUrl,
            'description' => fake()->realTextBetween(100, 300),
            'content' => fake()->realTextBetween(400, 1200),
            'published_at' => fake()->dateTime,
            'is_published' => fake()->boolean,
            'views' => fake()->numberBetween(1, 1000),
        ];
    }
}
