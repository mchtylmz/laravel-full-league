<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class SeasonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'status' => Arr::random([0, 1]),
            'transfer' => Arr::random([0, 1])
        ];
    }
}
