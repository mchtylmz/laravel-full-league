<?php

namespace App\Enums;

use ArchTech\Enums\Comparable;
use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Names;
use ArchTech\Enums\Values;

enum NewsInfoEnum: string
{
    use Names, Values, InvokableCases, Comparable;

    case FILE = 'file';

    case IMAGE = 'image';
    case VIDEO = 'video';

    public static function options(): array
    {
        return [
            self::FILE->value => __('Dosya / Dosyalar'),
            self::IMAGE->value => __('Resim / Fotoğraf'),
            self::VIDEO->value => __('Video / Videolar'),
        ];
    }

    public function extensions(): string
    {
        return match ($this->value) {
            self::FILE->value => '*',
            self::IMAGE->value => '.jpeg,.png,.jpg,.webp',
            self::VIDEO->value => '.mp4,.ogg',
        };
    }

    public function name(): string
    {
        return self::options()[$this->value] ?? '';
    }
}
