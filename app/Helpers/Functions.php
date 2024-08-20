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

if (! function_exists('dashboard_view')) {
    /**
     * @param $name
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    function dashboard_view($name, array $data = [])
    {
        return view(sprintf('dashboard.%s', $name), $data);
    }
}

if (! function_exists('dashboard_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function dashboard_asset(string $path, ?bool $secure = null)
    {
        return asset(sprintf('dashboard/%s', $path), $secure);
    }
}



if (! function_exists('livewire')) {
    /**
     * @param $name
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    function livewire($name, array $data = [])
    {
        return view(sprintf('livewire.%s', $name), $data);
    }
}
