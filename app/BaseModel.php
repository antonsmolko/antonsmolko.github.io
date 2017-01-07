<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

abstract class BaseModel extends Model
{
//    protected $db;
    protected $pk;

    public function __construct()
    {
//        $this->db = SQL::Instance();
        $this->pk = 'id';
    }

    // Получение списка
    public function getAll()
    {
//        return $this->db->query("SELECT * FROM {$this->table} ORDER BY dt_edit DESC");
        return DB::table($this->table)
            ->orderBy('dt_edit', 'desc')
            ->get();
    }

//    // Получение одной позиции
//    public function get($id)
//    {
//        $result = $this->db->query("SELECT * FROM {$this->table} WHERE {$this->pk}='$id'");
//
//        if (!$result) {
//            return false;
//        }
//
//        return $result[0];
//    }
//
//    // Добавление новости
//    public function add($title, $content)
//    {
//        return $this->db->insert("$this->table", ['title' => $title, 'content' => $content]);
//    }
//
//    // Обновление новости
//    public function edit($title, $content, $id)
//    {
//        return $this->db->update("$this->table", ['title' => $title, 'content' => $content], "{$this->pk}='$id'");
//    }
//
//    // Удаление одной позиции
//    public function delete($id)
//    {
//        return $this->db->delete("$this->table", "$this->pk='$id'");
//    }
}
