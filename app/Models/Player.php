<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Player extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    public $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'team_id'
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
