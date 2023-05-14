<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\ScoreTypeEnum;
use App\Enums\StatusEnum;
use App\Models\City;
use App\Models\Country;
use App\Models\Fixture;
use App\Models\Role;
use App\Models\Season;
use App\Models\Stadium;
use App\Models\Team;
use App\Models\User;
use App\Models\Week;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
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

        $stadium = Stadium::create([
            'name' => 'Stadyum TEST 1',
            'capacity' => 52600
        ]);

        $season = Season::create([
            'name' => '2023-2024', 'status' => 1, 'transfer' => 0
        ]);
        $league = $season->leagues()->create([
            'name' => 'Lig TEST 1',
            'group' => 1,
            'status' => StatusEnum::ACTIVE
        ]);
        Week::insert([
            ['name' => '1. Hafta', 'status' => StatusEnum::ACTIVE],
            ['name' => '2. Hafta', 'status' => StatusEnum::ACTIVE],
            ['name' => '3. Hafta', 'status' => StatusEnum::ACTIVE],
            ['name' => '4. Hafta', 'status' => StatusEnum::ACTIVE],
        ]);

        $team1 = Team::create([
            'name' => 'Takım TEST 1',
            'status' => StatusEnum::ACTIVE,
            'people_id' => 1,
            'stadium_id' => $stadium->id
        ]);
        $team2 = Team::create([
            'name' => 'Takım TEST 2',
            'status' => StatusEnum::ACTIVE,
            'people_id' => 1
        ]);
        $team3 = Team::create([
            'name' => 'Takım TEST 3',
            'status' => StatusEnum::ACTIVE,
            'people_id' => 1
        ]);

        Fixture::insert([
            [
                'season_id' => $season->id,
                'league_id' => $league->id,
                'week_id' => 1,
                'date' => '2023-05-14',
                'time' => '18:00',
                'stadium_id' => $stadium->id,
                'home_id' => $team1->id,
                'away_id' => $team2->id
            ],
            [
                'season_id' => $season->id,
                'league_id' => $league->id,
                'week_id' => 2,
                'date' => '2023-05-15',
                'time' => '15:00',
                'stadium_id' => $stadium->id,
                'home_id' => $team1->id,
                'away_id' => $team3->id
            ],
            [
                'season_id' => $season->id,
                'league_id' => $league->id,
                'week_id' => 3,
                'date' => '2023-05-16',
                'time' => '16:00',
                'stadium_id' => $stadium->id,
                'home_id' => $team3->id,
                'away_id' => $team2->id
            ],
            [
                'season_id' => $season->id,
                'league_id' => $league->id,
                'week_id' => 4,
                'date' => '2023-05-17',
                'time' => '17:00',
                'stadium_id' => $stadium->id,
                'home_id' => $team2->id,
                'away_id' => $team1->id
            ]
        ]);
        $fixture = Fixture::first();
        $fixture->scores()->create([
            'type' => ScoreTypeEnum::MATCH_RESULT,
            'home' => Arr::random([0, 5]),
            'away' => Arr::random([0, 5])
        ]);

        \App\Models\Category::factory(5)->create();
        \App\Models\Post::factory(5)->create();
    }
}
