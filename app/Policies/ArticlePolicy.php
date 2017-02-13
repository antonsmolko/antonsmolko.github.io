<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
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
            if ($permission->name == 'create_articles' || $permission->name == 'edit_articles' || $permission->name == 'publish_articles' || $permission->name == 'delete_articles') {
                return true;
            }
        }

        return false;
    }

    public function create(User $user)
    {
        foreach ($user->role[0]->permissions as $permission) {
            if ($permission->name == 'create_articles') {
                return true;
            }
        }

        return false;
    }

    public function edit(User $user)
    {
        foreach ($user->role[0]->permissions as $permission) {
            if ($permission->name == 'edit_articles') {
                return true;
            }
        }

        return false;
    }

    public function publish(User $user)
    {
        foreach ($user->role[0]->permissions as $permission) {
            if ($permission->name == 'publish_articles') {
                return true;
            }
        }

        return false;
    }

    public function delete(User $user)
    {
        foreach ($user->role[0]->permissions as $permission) {
            if ($permission->name == 'delete_articles') {
                return true;
            }
        }

        return false;
    }
}
