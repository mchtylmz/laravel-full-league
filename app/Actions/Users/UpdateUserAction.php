<?php

namespace App\Actions\Users;

use App\Enums\StatusEnum;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateUserAction
{
    use AsAction;

    public function handle(User $user, array $data): User
    {
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => $data['status'] ?? $user->status
        ]);

        if (!empty($data['role'])) {
            UpdateRoleAction::run(
                user: $user,
                role_id: $data['role']
            );
        }

        return $user;
    }
}
