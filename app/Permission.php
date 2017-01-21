<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Permission extends Model
{
    use EntrustUserTrait;
    //

    public function role()
    {
        return $this->hasMany('App\Role');
    }
}
