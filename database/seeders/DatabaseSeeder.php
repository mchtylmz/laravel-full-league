<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456')
        ]);
        \App\Models\Role::create([
            'name' => 'Admin'
        ]);

        $user = \App\Models\User::find(1);
        $role = \App\Models\Role::where('slug', 'admin')->first();
        $user->roles()->attach($role);
    }
}
