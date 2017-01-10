<?php

namespace App;

class UserModel extends BaseModel
{
    protected static $instance = [];

    public static function Instance()
    {
        if (self::$instance == null) {
            self::$instance = new UserModel();
        }

        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }
}