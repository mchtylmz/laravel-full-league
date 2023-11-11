<?php

namespace App\Enums;

enum GridEnum: int
{
    case COL12 = 12;
    case COL6 = 6;
    case COL4 = 4;
    case COL3 = 3;
    case COL2 = 2;

    public function title(): string
    {
        return match ($this) {
            self::COL12 => __('enum.grid.12'),
            self::COL6 =>  __('enum.grid.6'),
            self::COL4 =>  __('enum.grid.4'),
            self::COL3 =>  __('enum.grid.3'),
            self::COL2 =>  __('enum.grid.2'),
        };
    }
}
