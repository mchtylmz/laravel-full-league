<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\Season;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'Superadmin', 'level' => 100]);
        Role::create(['name' => 'Admin', 'level' => 90]);
        Role::create(['name' => 'Gözlemci', 'level' => 80]);
        Role::create(['name' => 'Hakem', 'level' => 70]);
        Role::create(['name' => 'Üye', 'level' => 0]);

        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'), // 123456
            'status' => 1,
            'role_id' => 1,
            'login' => 1,
            'nationality' => 2,
            'type' => 'admin',
            'remember_token' => Str::random(10),
        ]);
        //$admin->metas()->create(['name' => 'birthdate', 'value' => '1994-03-01']);
        \App\Models\User::factory(5)->create();

        Season::create([
            'name' => '2023-2024', 'status' => 1, 'transfer' => 0
        ]);

        \App\Models\Category::factory(5)->create();
        \App\Models\Post::factory(5)->create();
    }
}
