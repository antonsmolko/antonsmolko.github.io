<?php

namespace App\Models;

use App\Models\BaseModel;

class UsersModel extends BaseModel
{
    protected static $instance = [];

    public static function Instance()
    {
        if (self::$instance == null) {
            self::$instance = new UsersModel();
        }

        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }
}