<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        settings()->set([
            'siteTitle' => 'FootBall',
            'loginTitle' => 'Bilgi Yönetim Sistemi',
            'siteFavicon' => 'uploads/logo.webp',
            'siteLogo' => 'uploads/logo.webp',
            'siteLogoWhite' => 'uploads/logo_white.png',
            'siteDescription' => '',
            'siteKeywords' => ''
        ]);
        settings()->save();
    }
}
