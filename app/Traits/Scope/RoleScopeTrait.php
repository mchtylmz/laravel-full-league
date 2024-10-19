<?php

namespace App\Traits\Scope;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Builder;

trait RoleScopeTrait
{
    public function scopeAdmin(Builder $query): void
    {
        $query->permission(\App\Enums\RoleTypeEnum::ADMIN);
    }
}
