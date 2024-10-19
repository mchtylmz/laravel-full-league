<?php

namespace App\Actions\Users;

use App\Enums\StatusEnum;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateUserAction
{
    use AsAction;

    public function handle(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => $data['status'] ?? StatusEnum::ACTIVE
        ]);

        UpdateRoleAction::run(
            user: $user,
            role_id: $data['role'] ?? settings()->defaultRole
        );

        return $user;
    }
}
