<?php

namespace App\Enums;

enum StatusEnum : int
{
    case PASSIVE = 0;
    case ACTIVE = 1;
    case ARCHIVE = 2;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::ACTIVE  => 'Aktif',
            self::PASSIVE => 'Pasif',
            self::ARCHIVE => 'Arşiv',
        };
    }
}
