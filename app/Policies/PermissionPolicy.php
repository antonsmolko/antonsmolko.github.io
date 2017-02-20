<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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

    public function isAdmin(User $user)
    {
        if (isset($user->role[0])) {
            foreach ($user->role[0]->permissions as $permission) {
                if ($permission->name == 'admin_access') {
                    return true;
                }
            }
        }

        return false;
    }
}
