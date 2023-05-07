<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Images\HasImages;
use Zoha\Metable;

class People extends Model
{
    use HasFactory, HasImages, Loggable, Metable;

    public $fillable = [
        'user_id',
        'first_name',
        'last_name'
    ];
}
