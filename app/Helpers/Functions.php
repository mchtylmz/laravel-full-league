<?php

use App\Enums\InfoTypeEnum;

if (! function_exists('user')) {
    /**
     * @param null $key
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    function user($key = null)
    {
        if ($key) {
            return auth()->user()?->{$key} ?? null;
        }

        return auth()?->user();
    }
}

if (! function_exists('infoTypesMenu')) {

    /**
     * @param string $key
     * @return array
     */
    function infoTypesMenu(string $key): array
    {
        if ($key == 'user') {
            return [
                InfoTypeEnum::LICENCE_TYPES->value => InfoTypeEnum::LICENCE_TYPES->name()
            ];
        }

        return [];
    }
}
