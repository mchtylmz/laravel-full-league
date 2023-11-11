<?php

namespace App\Enums;

enum StatusEnum: int
{
    //case PASSIVE = 0;
    case ACTIVE = 1;
    case ARCHIVE = 2;

    public function title(): string
    {
        return match ($this) {
            //self::PASSIVE => __('enum.status.passive'),
            self::ACTIVE =>  __('enum.status.active'),
            self::ARCHIVE =>  __('enum.status.archive')
        };
    }

    public function badge(): string
    {
        $data = match ($this) {
            //self::PASSIVE => ['status' => 'danger', 'text' => __('enum.status.passive')],
            self::ACTIVE => ['status' => 'success', 'text' => __('enum.status.active')],
            self::ARCHIVE => ['status' => 'warning', 'text' => __('enum.status.archive')]
        };

        return view('components.badge', $data)->render();
    }
}
