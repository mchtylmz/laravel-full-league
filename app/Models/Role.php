<?php

namespace App\Models;

use App\Enums\RoleLevelEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Role
 */
class Role extends Model
{
    use HasFactory;


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
