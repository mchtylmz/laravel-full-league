<?php

namespace App\Scopes;

trait FixtureScope
{
    public function scopeUpComing($query): mixed
    {
        return $query->where('date', '>', date('Y-m-d'))
            ->orWhere(function ($subQuery) {
                $subQuery->where('date', date('Y-m-d'))
                    ->where('time', '>=', date('H:i'));
            })
            ->orderBy('date', 'ASC')
            ->orderBy('time', 'ASC');
    }

    public function scopePast($query): mixed
    {
        return $query->where('date', '<=', date('Y-m-d'))
            ->orWhere(function ($subQuery) {
                $subQuery->where('date', date('Y-m-d'))
                    ->where('time', '<=', date('H:i'));
            })
            ->orderBy('date', 'ASC')
            ->orderBy('time', 'ASC');
    }
}
