<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function rule(User $user)
    {
        foreach ($user->role[0]->permissions as $permission) {
            if ($permission->name == 'create_edit_delete_roles') {
                return true;
            }
        }

        return false;
    }
}
