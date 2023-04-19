<?php

namespace App\Enums;

enum UserStatus : int
{
    case PASSIVE = 0;
    case ACTIVE = 1;

    /**
     * @return string
     */
    public function title(): string
    {
        return match ($this) {
            self::ACTIVE => 'Aktif',
            default => 'Pasif'
        };
    }
}
