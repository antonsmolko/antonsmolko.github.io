<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
//use Zizaco\Entrust\Traits\EntrustUserTrait;
//use Zizaco\Entrust\EntrustRole;

class Role extends Model
{
//    use EntrustUserTrait;
    //
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }
}
