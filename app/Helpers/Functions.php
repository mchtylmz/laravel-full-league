<?php

if (!function_exists('user')) {
    function user(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return auth()?->user();
    }
}
