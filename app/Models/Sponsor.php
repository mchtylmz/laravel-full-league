<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Images\HasImages;
use Zoha\Metable;

class Sponsor extends Model
{
    use HasFactory, Metable, HasImages;

    public $fillable = [
        'name',
        'location',
        'status',
        'sort'
    ];
}
