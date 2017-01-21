<?php
namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public function getPermissions($roles)
    {
        foreach ($roles as $role) {
            $perms = $role->permission;

            foreach ($perms as $key) {
                $permissions[$role['id']][] = $key['name'];
            }
        }

        return $permissions;
    }
}