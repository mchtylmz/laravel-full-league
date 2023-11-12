<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'name',
        'status',
        'transfer'
    ];

    public function leagues()
    {
        return $this->belongsToMany(League::class, 'seasons_leagues');
    }
}
