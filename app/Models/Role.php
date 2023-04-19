<?php

namespace App\Models;

use App\Enums\RoleLevel;
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
        'level' => RoleLevel::class
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }
}
