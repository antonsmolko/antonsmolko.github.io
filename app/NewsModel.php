<?php

namespace App;

use App\BaseModel;


class NewsModel extends BaseModel
{
    protected static $instance = [];

    public static function Instance()
    {
        if (self::$instance == null) {
            self::$instance = new NewsModel();
        }

        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();
        $this->table = 'news';
    }
}