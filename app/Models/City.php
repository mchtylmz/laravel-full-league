<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Zoha\Metable;

class City extends Model
{
    use HasFactory, Loggable, Metable;

    public $timestamps = false;

    public $fillable = [
        'name',
        'country_id',
        'code'
    ];
}
