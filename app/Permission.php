<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    use EntrustUserTrait;
    //

    public function role()
    {
        return $this->hasMany('App\Role');
    }
}
