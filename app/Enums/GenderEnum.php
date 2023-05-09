<?php

namespace App\Enums;

enum GenderEnum : string
{
    case MALE = 'M';
    case FEMALE = 'F';
    case UNKNOWN = 'N';

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::MALE  => 'Erkek',
            self::FEMALE => 'Kadın',
            self::UNKNOWN => 'Bilinmeyen',
        };
    }
}
