<?php

namespace App\Models;

use App\Enums\LocaleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    public $fillable = [
        'key',
        'value',
        'locale'
    ];

    public $casts = [
        'locale' => LocaleEnum::class
    ];
}
