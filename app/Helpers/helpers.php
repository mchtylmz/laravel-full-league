<?php

if (!function_exists('cases')) {

    /**
     * @param string $type
     * @return array
     */
    function cases(string $type): array
    {
        return match ($type) {
            'status' => \App\Enums\StatusEnum::cases(),
            'role_level' => \App\Enums\RoleLevelEnum::cases(),
            'region' => \App\Enums\RegionEnum::cases(),
            'locale' => \App\Enums\LocaleEnum::cases(),
            'nationality' => \App\Enums\NationalityEnum::cases(),
            'post_type' => \App\Enums\PostTypeEnum::cases(),
            'user_type' => \App\Enums\UserTypeEnum::cases(),
        };
    }
}

