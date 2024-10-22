<?php

namespace App\Enums;

use ArchTech\Enums\Comparable;
use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Names;
use ArchTech\Enums\Values;

enum LocaleEnum: string
{
    use Names, Values, InvokableCases, Comparable;

    case TR = 'tr';

    case EN = 'en';

    public static function options(): array
    {
        return [
            self::TR->value => __('Türkçe'),
            self::EN->value => __('English'),
        ];
    }

    public function name(): string
    {
        return self::options()[$this->value] ?? '';
    }
}
