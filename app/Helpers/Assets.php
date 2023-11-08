<?php

namespace App\Helpers;

class Assets
{
    /**
     * @var string|\Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|mixed
     */
    public string $version;

    /**
     *
     */
    public function __construct()
    {
        $this->version = config('app.version');
        if (config('app.debug', false)) {
            $this->version .= sprintf('-d%s', time());
        }
    }

    public function image($file): string
    {
        return asset(sprintf(
            'assets/images/%s?v=%s',
            $file,
            $this->version
        ));
    }

    public function css($file): string
    {
        return asset(sprintf(
            'assets/css/%s?v=%s',
            $file,
            $this->version
        ));
    }

    public function js($file): string
    {
        return asset(sprintf(
            'assets/js/%s?v=%s',
            $file,
            $this->version
        ));
    }

    public function libs($file): string
    {
        return asset(sprintf(
            'assets/libs/%s?v=%s',
            $file,
            $this->version
        ));
    }

    protected function set($file): string
    {
        return asset(sprintf(
            '%s?v=%s', $file, $this->version
        ));
    }

    public function admin(string $file): string
    {
        return asset(sprintf(
            'assets/admin/%s?v=%s',
            $file,
            $this->version
        ));
    }
}
