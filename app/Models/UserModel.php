<?php

namespace App\Models;

use App\Models\BaseModel;
use App\User;


class UserModel extends BaseModel
{
    public static $instance = null;

    private function __construct() { }

    static function instance()
    {
        if ( is_null(self::$instance) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getRoles($users)
    {
        foreach ($users as $user) {
            $role = $user->roles;

            foreach ($role as $key) {
                $roles[$user['id']] = $key['display_name'];
            }
        }

        return $roles;
    }
}