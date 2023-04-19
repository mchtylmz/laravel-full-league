<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class RoleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'level' => Arr::random([1,3])
        ];
    }
}
