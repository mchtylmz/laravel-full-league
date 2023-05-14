<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Images\HasImages;
use Zoha\Metable;

class Team extends Model
{
    use HasFactory, Metable, HasImages, Loggable;

    public $fillable = [
        'name',
        'address',
        'phone',
        'fax',
        'email',
        'status',
        'people_id',
        'stadium_id'
    ];

    public $casts = [
        'status' => StatusEnum::class
    ];

    public function president(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(People::class);
    }

    public function stadium(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Stadium::class);
    }
}
