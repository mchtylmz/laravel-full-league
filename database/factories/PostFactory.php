<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
            'user_id' => 1,
            'category_id' => Arr::random([1, 4]),
            'title' => fake()->sentence,
            'slug' => fake()->slug,
            'description' => fake()->sentence(20),
            'content' => fake()->text,
            'status' => 1,
            'is_home' => Arr::random([0, 1]),
            'viewed' => 0,
            'source' => 'fake',
            'image_id' => Arr::random([1, 3]),
            'started_at' => date('Y-m-d H:i:s')
        ];
    }
}
