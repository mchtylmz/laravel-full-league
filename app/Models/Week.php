<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'status'
    ];

    public $casts = [
        'status' => StatusEnum::class
    ];
}
