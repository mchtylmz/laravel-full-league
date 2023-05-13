<?php

namespace App\Enums;

enum LocaleEnum : string
{
    case TR = 'tr';
    case EN = 'en';

    /**
     * @return string
     */
    public function title(): string
    {
        return match ($this) {
            self::TR  => 'Türkçe',
            self::EN => 'English'
        };
    }

    /**
     * @return string
     */
    public function code(): string
    {
        return match ($this) {
            self::TR  => 'tr',
            self::EN => 'en'
        };
    }
}
