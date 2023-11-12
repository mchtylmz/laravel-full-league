<?php

namespace App\Enums;

enum LocaleEnum: string
{
    case TR = 'tr';
    case EN = 'en';

    public function title(): string
    {
        return match ($this) {
            self::TR => __('enum.tr'),
            self::EN => __('enum.en')
        };
    }

    public function badge(): string
    {
        $data = match ($this) {
            self::TR => ['code' => 'tr', 'text' => __('enum.tr')],
            self::EN => ['code' => 'en', 'text' => __('enum.en')]
        };

        return view('components.flag', $data)->render();
    }
}
