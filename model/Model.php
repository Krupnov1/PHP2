<?php

namespace app\model;

use app\interfaces\IModel;

abstract class Model implements IModel {
    
    protected $db;

    abstract public function getTableName();

    public function __construct($db) {
        $this->db = $db;
    }

    public function insert() {}

    public function update() {}

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll() {
        $tableName = $this->getTableName();
        if ($tableName == 'product') {
            $sql = "SELECT * FROM {$tableName} ORDER BY likes DESC";
        } else {
            $sql = "SELECT * FROM {$tableName}";
        }
        return $this->db->queryAll($sql);
    }

    public function delete() {
        $sql = "DELETE";
        $this->db->execute($sql);
    }

}