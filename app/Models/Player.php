<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Images\HasImages;

/**
 *
 */
class Player extends Model
{
    use HasFactory, Loggable, HasImages;

    /**
     * @var string[]
     */
    public $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'team_id',
        'country_id',
    ];

    /**
     * @var string[]
     */
    public $casts = [
        'birthdate' => 'date'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
