<?php

namespace App\Enums;

enum RoleLevelEnum : int
{
    case MEMBER = 0;
    case ADMIN = 90;
    case SUPERADMIN = 100;
    case REFEREE = 70;
    case REFEREE_OBSERVER = 80;

}
