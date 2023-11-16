<?php

namespace App\Scopes;

use App\Enums\StatusEnum;

trait StatusScope
{
    public function scopeActive($query): mixed
    {
        return $query->where('status', StatusEnum::ACTIVE);
    }

    public function scopePassive($query): mixed
    {
        return $query->where('status', StatusEnum::PASSIVE);
    }

    public function scopeArchive($query): mixed
    {
        return $query->where('status', StatusEnum::ARCHIVE);
    }
}
