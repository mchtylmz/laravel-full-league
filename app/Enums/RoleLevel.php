<?php

namespace App\Enums;

enum RoleLevel : int
{
    case ADMIN = 1;
    case REFEREE = 2;
    case REFEREE_OBSERVER = 3;

}
