<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Images\HasImages;
use Pharaonic\Laravel\Settings\Traits\Settingable;
use Zoha\Metable;

class League extends Model
{
    use HasFactory, Metable, Settingable, Loggable, HasImages;

    public $fillable = [
        'season_id',
        'name',
        'group',
        'status'
    ];

    public $casts = [
        'status' => StatusEnum::class
    ];

    public function season(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Season::class);
    }
}
