<?php

namespace App\Models;

use App\Casts\MatchDate;
use App\Casts\MatchTime;
use App\Enums\ScoreTypeEnum;
use App\Enums\StatusEnum;
use App\Scopes\FixtureScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Images\HasImages;
use Zoha\Metable;

class Fixture extends Model
{
    use HasFactory, Metable, HasImages, FixtureScope;

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
        'date' => MatchDate::class,
        'time' => MatchTime::class,
        'status' => StatusEnum::class
    ];

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

    public function scores(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Score::class);
    }

    public function result(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Score::class)->whereType(ScoreTypeEnum::MATCH_RESULT);
    }
}
