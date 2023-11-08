<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(string $username, string $password): bool
    {
        return Auth::attempt([
            'username' => $username,
            'password' => $password
        ]);
    }

    public function logout(): void
    {
        Auth::logout();
    }
}
