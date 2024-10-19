<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class LogoutAction
{
    use AsAction;

    public function handle(): void
    {
        // TODO: log

        Auth::logout();

        request()->session()->regenerate(true);
    }
}
