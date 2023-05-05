<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Settings\Traits\Settingable;

class Season extends Model
{
    use HasFactory, Settingable, Loggable;

    /**
     * @var string[]
     */
    public $fillable = [
        'name',
        'status',
        'transfer'
    ];

    public $casts = [
        'status' => StatusEnum::class
    ];
}
