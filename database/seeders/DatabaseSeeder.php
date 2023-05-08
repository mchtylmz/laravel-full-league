<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\StatusEnum;
use App\Models\City;
use App\Models\Country;
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
        $tr = Country::create(['name' => 'Türkiye', 'code' => 'TR']);
        $kktc = Country::create(['name' => 'Kuzey Kıbrıs', 'code' => 'KKTC']);

        City::create(['name' => 'İstanbul', 'code' => '34', 'country_id' => $tr->id]);
        City::create(['name' => 'İzmir', 'code' => '35', 'country_id' => $tr->id]);
        City::create(['name' => 'Ankara', 'code' => '06', 'country_id' => $tr->id]);
        City::create(['name' => 'Lefkoşa', 'code' => '01', 'country_id' => $kktc->id]);
        City::create(['name' => 'Girne', 'code' => '02', 'country_id' => $kktc->id]);

        Role::create(['name' => 'Superadmin', 'code' => 100]);
        Role::create(['name' => 'Admin', 'code' => 99]);
        Role::create(['name' => 'Gözlemci', 'code' => 35]);
        Role::create(['name' => 'Hakem', 'code' => 30]);
        Role::create(['name' => 'Üye', 'code' => 10]);

        $admin = User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'), // 123456
            'status' => StatusEnum::ACTIVE,
            'role_id' => 1,
            'remember_token' => Str::random(10),
        ]);
        $admin->setMeta('birthdate', '1994-03-01');
        $admin->people()->create([
            'first_name' => 'Admin',
            'last_name' => 'admin',
        ]);
        \App\Models\User::factory(5)->create();

        Season::create([
            'name' => '2023-2024', 'status' => 1, 'transfer' => 0
        ]);

        \App\Models\Category::factory(5)->create();
        \App\Models\Post::factory(5)->create();
    }
}
