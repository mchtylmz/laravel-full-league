<?php

namespace Database\Factories;

use App\Enums\StatusEnum;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Arr::random(Category::all()->pluck('id')->toArray()),
            'title' => fake()->text(60),
            'slug' => fake()->unique()->slug,
            'brief' => fake()->text(150),
            'content' => fake()->text(300),
            'image' => 'uploads/logo.webp',
            'keywords' => '',
            'hits' => rand(1, 10000),
            'owner_id' => Arr::random(User::all()->pluck('id')->toArray()),
            'status' => fake()->boolean ? StatusEnum::ACTIVE : StatusEnum::PASSIVE,
            'published_at' => fake()->dateTime()
        ];
    }
}