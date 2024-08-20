<?php

namespace App\Models;

use App\Traits\CastTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory, CastTrait;
}
