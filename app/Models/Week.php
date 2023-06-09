<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory, Loggable;

    public $timestamps = false;

    public $fillable = [
        'name',
        'status'
    ];

    public $casts = [
        'status' => StatusEnum::class
    ];
}
