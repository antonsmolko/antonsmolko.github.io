<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Article extends Model
{
    use EntrustUserTrait;

    public function author()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
