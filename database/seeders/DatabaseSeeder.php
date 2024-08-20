<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'test@example.com',
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('12345')
        ]);

        $category = Category::create([
            'slug' => 'category',
            'name' => 'category'
        ]);

        News::create([
            'slug' => 'slug',
            'category_id' => $category->id,
            'title' => 'title'
        ]);

        settings()->set([
            'siteTitle' => 'Football',
            'siteFavicon' => 'uploads/logo.png',
            'siteLogo' => 'uploads/logo.png',
        ]);
        settings()->save();
    }
}
