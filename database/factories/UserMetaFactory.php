<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class UserMetaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => Arr::random([1,5]),
            'name' => fake()->title(),
            'value' => fake()->name()
        ];
    }
}
