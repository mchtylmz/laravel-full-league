<?php

namespace App\Enums;

enum UserTypeEnum : string
{
    case USER = 'user';
    case MEMBER = 'member';

    /**
     * @return string
     */
    public function name(): string
    {
        return match ($this) {
            self::USER => 'Kişi',
            self::MEMBER => 'Kullanıcı/Üye'
        };
    }
}
