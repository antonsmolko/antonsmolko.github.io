<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
//use Zizaco\Entrust\Traits\EntrustUserTrait;
//use Zizaco\Entrust\EntrustPermission;

class Permission extends Model
{
//    use EntrustUserTrait;
    //

    public function role()
    {
        return $this->hasMany('App\Models\Role');
    }
}
