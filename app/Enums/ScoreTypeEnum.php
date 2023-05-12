<?php

namespace App\Enums;

enum ScoreTypeEnum : int
{
    case MS = 1;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::MS => '1',
        };
    }
}
