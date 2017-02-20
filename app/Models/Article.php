<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Zizaco\Entrust\Traits\EntrustUserTrait;
use DB;

class Article extends Model
{
//    use EntrustUserTrait;

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function author()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
