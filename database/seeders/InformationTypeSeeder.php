<?php

namespace Database\Seeders;

use App\Models\InformationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InformationType::insert([
            [
                'code' => 'licence',
                'name' => 'Antrenör Lisanları',
                'group' => 'user'
            ],
            [
                'code' => 'transfer',
                'name' => 'Transfer Türleri',
                'group' => 'user'
            ],
            [
                'code' => 'user',
                'name' => 'Kişi Türleri',
                'group' => 'user'
            ],
            [
                'code' => 'region',
                'name' => 'Bölgeler',
                'group' => 'user'
            ],
            [
                'code' => 'classman',
                'name' => 'Klasmanlar',
                'group' => 'user'
            ],
            [
                'code' => 'nation',
                'name' => 'Uyruklar',
                'group' => 'user'
            ],
            [
                'code' => 'education',
                'name' => 'Eğitim Durumları',
                'group' => 'user'
            ],
            [
                'code' => 'job',
                'name' => 'Meslekler',
                'group' => 'user'
            ],
            [
                'code' => 'city',
                'name' => 'Şehirler',
                'group' => 'user'
            ],
            [
                'code' => 'board',
                'name' => 'Kurul Görevleri',
                'group' => 'board'
            ],
            [
                'code' => 'job',
                'name' => 'Milli Takım Görevleri',
                'group' => 'national'
            ],
            [
                'code' => 'category',
                'name' => 'Milli Takım Kategorileri',
                'group' => 'national'
            ],
            [
                'code' => 'discipline',
                'name' => 'Disiplin Kurulu Cezaları',
                'group' => 'punishment'
            ],
            [
                'code' => 'money',
                'name' => 'Para Cezası Nedenleri',
                'group' => 'punishment'
            ],
            [
                'code' => 'form',
                'name' => 'Kulüp Form Türleri',
                'group' => 'club'
            ],
            [
                'code' => 'goal',
                'name' => 'Gol Tipleri',
                'group' => 'match'
            ],
            [
                'code' => 'status',
                'name' => 'Maç Durumları',
                'group' => 'match'
            ],
            [
                'code' => 'fixture',
                'name' => 'Gruplar',
                'group' => 'fixture'
            ],
        ]);
    }
}
