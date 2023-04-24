<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Settings\Traits\Settingable;

class Season extends Model
{
    use HasFactory, Settingable;


    /**
     * @var string[]
     */
    public $fillable = [
        'name',
        'status',
        'transfer'
    ];
}
