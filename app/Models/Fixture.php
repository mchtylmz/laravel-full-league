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
        'code',
        'season_id',
        'league_id',
        'week_id',
        'date',
        'time',
        'stadium_id',
        'home_id',
        'away_id',
        'delay',
        'status'
    ];

    protected $casts = [
        //'date' => 'immutable_date',
        //'time' => 'date:H:i',
        'status' => StatusEnum::class
    ];

    public function scopeUpComing($query): mixed
    {
        return $query->where('date', '>=', date('Y-m-d'))
            ->where('time', '>=', date('H:i'))
            ->orderBy('date', 'ASC')
            ->orderBy('time', 'ASC');
    }

    public function season(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function league(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(League::class);
    }

    public function week(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Week::class);
    }

    public function homeTeam(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_id');
    }

    public function awayTeam(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_id');
    }
}
