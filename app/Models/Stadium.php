<?php

namespace App\Models;

use App\Enums\RegionEnum;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'capacity',
        'status',
        'region',
        'price',
        'lat',
        'lon',
    ];

    public $casts = [
        'status' => StatusEnum::class,
        'region' => RegionEnum::class,
    ];
}
