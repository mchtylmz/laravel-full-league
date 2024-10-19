<?php

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
