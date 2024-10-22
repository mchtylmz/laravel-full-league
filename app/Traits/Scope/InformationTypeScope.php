<?php

namespace App\Traits\Scope;

use Illuminate\Database\Eloquent\Builder;

class InformationTypeScope
{
    public function scopeAdmin(Builder $query): void
    {
        $query->permission(\App\Enums\RoleTypeEnum::ADMIN);
    }
}
