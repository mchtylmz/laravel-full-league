<?php

namespace App\Enums;

enum StatusEnum: int
{
    case ACTIVE = 1;
    case ARCHIVE = 2;

    case PASSIVE = 0;

    public function title(): string
    {
        return match ($this) {
            self::ACTIVE =>  __('enum.status.active'),
            self::ARCHIVE =>  __('enum.status.archive'),
            self::PASSIVE => __('enum.status.passive'),
        };
    }

    public function badge(): string
    {
        $data = match ($this) {
            self::ACTIVE => ['status' => 'success', 'text' => __('enum.status.active')],
            self::ARCHIVE => ['status' => 'warning', 'text' => __('enum.status.archive')],
            self::PASSIVE => ['status' => 'danger', 'text' => __('enum.status.passive')],
        };

        return view('components.badge', $data)->render();
    }
}
