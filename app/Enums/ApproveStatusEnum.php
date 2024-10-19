<?php

namespace App\Enums;

use ArchTech\Enums\Comparable;
use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Names;
use ArchTech\Enums\Values;

enum ApproveStatusEnum: string
{
    use Names, Values, InvokableCases, Comparable;

    case PENDING = 'pending';

    case APPROVED = 'approved';

    case REJECTED = 'rejected';

    public static function options(): array
    {
        return [
            self::PENDING->value => __('Beklemede'),
            self::APPROVED->value => __('Onaylandı'),
            self::REJECTED->value => __('Reddedildi'),
        ];
    }

    public function class(): string
    {
        return match ($this->value) {
            self::PENDING->value => 'warning',
            self::APPROVED->value => 'success',
            self::REJECTED->value => 'danger',
        };
    }

    public function name(): string
    {
        return self::options()[$this->value] ?? '';
    }
}
