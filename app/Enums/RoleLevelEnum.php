<?php

namespace App\Enums;

enum RoleLevelEnum : int
{
    case MEMBER = 0;
    case ADMIN = 1;
    case REFEREE = 2;
    case REFEREE_OBSERVER = 3;

}
