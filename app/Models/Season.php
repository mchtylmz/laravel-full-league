<?php

namespace App\Models;

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
}
