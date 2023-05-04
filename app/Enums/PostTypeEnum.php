<?php

namespace App\Enums;

enum PostTypeEnum : string
{
    case POST = 'post';
    case PAGE = 'page';

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::POST => 'İçerik',
            self::PAGE => 'Sayfa'
        };
    }
}
