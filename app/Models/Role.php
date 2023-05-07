<?php

namespace App\Models;

use App\Enums\RoleCodeEnum;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Settings\Traits\Settingable;


/**
 * Role
 */
class Role extends Model
{
    use HasFactory, Settingable, Loggable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'code'
    ];


    /**
     * @var string[]
     */
    public $casts = [
        'code' => RoleCodeEnum::class
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }
}
