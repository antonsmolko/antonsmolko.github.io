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

    public function create(User $user)
    {
        foreach ($user->role[0]->permission as $permission) {
            if ($permission->name == 'create_articles') {
                return true;
            }
        }

        return false;
    }

    public function edit(User $user)
    {
        foreach ($user->role[0]->permission as $permission) {
            if ($permission->name == 'edit_articles') {
                return true;
            }
        }

        return false;
    }
}
