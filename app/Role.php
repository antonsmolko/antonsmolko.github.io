<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    use EntrustUserTrait;
    //
    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function permission()
    {
        return $this->belongsToMany('App\Permission');
    }
}
