<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    public $fillable = [
        'metable_type',
        'metable_id',
        'key',
        'value',
        'type'
    ];
}
