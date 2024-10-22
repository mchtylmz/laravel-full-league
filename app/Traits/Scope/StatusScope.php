<?php

namespace App\Traits\Scope;

use App\Enums\ApproveStatusEnum;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Builder;

trait StatusScope
{
    public function scopeActive(Builder $query): void
    {
        $query->where('status', StatusEnum::ACTIVE);
    }

    public function scopePassive(Builder $query): void
    {
        $query->where('status', StatusEnum::PASSIVE);
    }

    public function scopePending(Builder $query): void
    {
        $query->where('status', ApproveStatusEnum::PENDING);
    }

    public function scopeApproved(Builder $query): void
    {
        $query->where('status', ApproveStatusEnum::APPROVED);
    }

    public function scopeRejected(Builder $query): void
    {
        $query->where('status', ApproveStatusEnum::REJECTED);
    }
}
