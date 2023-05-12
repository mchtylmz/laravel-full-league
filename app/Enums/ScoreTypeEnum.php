<?php

namespace App\Enums;

enum ScoreTypeEnum : int
{
    case PASSIVE = 1;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::PASSIVE  => '1',
        };
    }
}
