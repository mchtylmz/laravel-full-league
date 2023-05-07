<?php

namespace App\Enums;

enum RoleCodeEnum : int
{
    case UNKNOWN = 0;
    case USER = 10;
    case PERSONAL = 20;
    case REFEREE = 30;
    case REFEREE_OBSERVER = 35;
    case PRESIDENT = 40;
    case ADMIN = 99;
    case SUPERADMIN = 100;

    /**
     * @return string
     */
    public function name(): string
    {
        return match ($this) {
            self::UNKNOWN => 'Bilinmeyen',
            self::USER => 'Üye',
            self::PERSONAL => 'Personel',
            self::REFEREE => 'Hakem',
            self::PRESIDENT => 'Başkan',
            self::ADMIN => 'Yönetici',
            self::SUPERADMIN => 'Tam Yönetici'
        };
    }

}
