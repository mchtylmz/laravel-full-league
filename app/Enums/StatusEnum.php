<?php

namespace App\Enums;

enum StatusEnum: int
{
    case PASSIVE = 0;
    case ACTIVE = 1;
    case ARCHIVE = 2;

    public function title(): string
    {
        return match ($this) {
            self::PASSIVE => __('enum.status.passive'),
            self::ACTIVE =>  __('enum.status.active'),
            self::ARCHIVE =>  __('enum.status.archive')
        };
    }

    public function badge(): string
    {
        return match ($this) {
            self::PASSIVE => sprintf('<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">%s</span>', __('enum.status.passive')),
            self::ACTIVE => sprintf('<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">%s</span>', __('enum.status.active')),
            self::ARCHIVE => sprintf('<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">%s</span>', __('enum.status.archive'))
        };
    }
}
