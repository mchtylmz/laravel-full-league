<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use App\Models\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Season::create([
            'name' => '2024-2025'
        ]);
        Season::create([
            'name' => '2023-2024',
            'status' => StatusEnum::PASSIVE
        ]);
    }
}
