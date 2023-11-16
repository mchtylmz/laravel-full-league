<?php

namespace App\Models;

use App\Scopes\StatusScope;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    use HasFactory, Loggable, StatusScope;

    public $timestamps = false;
}
