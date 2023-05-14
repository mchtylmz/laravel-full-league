<?php

namespace App\Enums;

enum ScoreTypeEnum : int
{
    case MATCH_START  = 6;
    case FIRST_HALF   = 1;
    case HALF_TIME    = 7;
    case SECOND_HALF  = 11;
    case MATCH_END    = 13;
    case MATCH_RESULT = 2;
    case FIRST_EXTRA  = 3;
    case SECOND_EXTRA = 4;
    case PENALTIES    = 5;

    /**
     * @return string
     */
    public function title(): string
    {
        return match ($this) {
            self::MATCH_START   => 'Maç Başladı',
            self::FIRST_HALF    => 'İlk Yarı',
            self::HALF_TIME     => 'Devre Arası',
            self::SECOND_HALF   => 'İkinci Yarı',
            self::MATCH_END     => 'Maç Bitti',
            self::MATCH_RESULT  => 'Maç Sonucu',
            self::FIRST_EXTRA   => '1. Uzatma',
            self::SECOND_EXTRA  => '2. Uzatma',
            self::PENALTIES     => 'Seri Penaltı'
        };
    }
}
