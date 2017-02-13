<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
            if ($permission->name == 'view_users' || $permission->name == 'create_users' || $permission->name == 'edit_users' || $permission->name == 'activate_users' || $permission->name == 'delete_users') {
                return true;
            }
        }

        return false;
    }

    public function create(User $user)
    {
        foreach ($user->role[0]->permissions as $permission) {
            if ($permission->name == 'create_users') {
                return true;
            }
        }

        return false;
    }

    public function edit(User $user)
    {
        foreach ($user->role[0]->permissions as $permission) {
            if ($permission->name == 'edit_users') {
                return true;
            }
        }

        return false;
    }

    public function activate(User $user)
    {
        foreach ($user->role[0]->permissions as $permission) {
            if ($permission->name == 'activate_users') {
                return true;
            }
        }

        return false;
    }

    public function delete(User $user)
    {
        foreach ($user->role[0]->permissions as $permission) {
            if ($permission->name == 'delete_users') {
                return true;
            }
        }

        return false;
    }
}
