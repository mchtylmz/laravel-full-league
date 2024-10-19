<?php

namespace App\Actions\Users;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;

class UpdateRoleAction
{
    use AsAction;

    public function handle(User $user, int $role_id): false|User
    {
        if (!$role = Role::findById($role_id)) {
            return false;
        }

       return $user->assignRole($role);
    }
}
