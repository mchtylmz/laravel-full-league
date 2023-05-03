<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    use HasFactory, Loggable;

    public $fillable = [
        'user_id',
        'name',
        'value'
    ];

    public $timestamps = false;
}
