<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Images\HasImages;
use Zoha\Metable;

class Team extends Model
{
    use HasFactory, Metable, HasImages;

    public $fillable = [
        'name',
        'address',
        'phone',
        'fax',
        'email',
        'status'
    ];

    public $casts = [
        'status' => StatusEnum::class
    ];
}
