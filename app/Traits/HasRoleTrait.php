<?php

namespace App\Traits;

use App\Models\Role;

trait HasRoleTrait
{
    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    public function role()
    {
        return $this->roles()->first();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }
}
