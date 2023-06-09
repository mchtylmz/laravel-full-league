<?php

namespace App\Models;

use App\Enums\RegionEnum;
use App\Enums\StatusEnum;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Images\HasImages;
use Pharaonic\Laravel\Settings\Traits\Settingable;
use Zoha\Metable;

/**
 *
 */
class Stadium extends Model
{
    use HasFactory, Settingable, Loggable, HasImages, Metable;

    /**
     * @var string
     */
    public $table = 'stadiums';

    /**
     * @var string[]
     */
    public $fillable = [
        'name',
        'capacity',
        'status',
        'region',
        'price',
        'lat',
        'lon',
    ];

    /**
     * @var string[]
     */
    public $casts = [
        'status' => StatusEnum::class,
        'region' => RegionEnum::class,
    ];
}
