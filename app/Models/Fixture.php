<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Images\HasImages;
use Zoha\Metable;

class Fixture extends Model
{
    use HasFactory, Metable, HasImages;

    public $fillable = [
        'match',
        'season_id',
        'league_id',
        'week_id',
        'match_date',
        'match_hour',
        'stadium_id',
        'home_id',
        'away_id',
        'delay',
        'status'
    ];

    protected $casts = [
        'match_date' => 'date',
        'match_hour' => 'time',
        'status' => StatusEnum::class
    ];
}
