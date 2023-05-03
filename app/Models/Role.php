<?php

namespace App\Models;

use App\Enums\RoleLevelEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pharaonic\Laravel\Settings\Traits\Settingable;


/**
 * Role
 */
class Role extends Model
{
    use HasFactory, Settingable;


    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'level'
    ];


    /**
     * @var string[]
     */
    public $casts = [
        'level' => RoleLevelEnum::class
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }
}
