<?php

namespace App\Models;

use App\Enums\ScoreTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Zoha\Metable;

class Score extends Model
{
    use HasFactory, Metable;

    public $fillable = [
        'fixture_id',
        'type',
        'home',
        'away'
    ];

    public $casts = [
        'type' => ScoreTypeEnum::class
    ];
}
