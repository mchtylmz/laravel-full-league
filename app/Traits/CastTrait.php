<?php

namespace App\Traits;

trait CastTrait
{
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i',
            'updated_at' => 'datetime:Y-m-d H:i',
            'deleted_at' => 'datetime:Y-m-d H:i',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
