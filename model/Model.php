<?php

namespace app\model;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel {
    
    abstract public function getTableName();

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ['id' => $id]);
    }

    public function getOneObject($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public function getAllObject($sql) {
        //$tableName = $this->getTableName();
        //$sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAllObject($sql, $params = [], static::class);
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert() {
        $columns = $values = $params = array(); 
        foreach ($this as $key => $value) {
            $columns[] = $key; 
            $values[] =  "?";   //":".$key;                     
            $params[] =  ($value);
        }
        //"INSERT INTO {$this->getTableName()}('name', 'description', 'price') VALUES (:name, :description, :price)";
        $sql = "INSERT INTO {$this->getTableName()} (".implode(",", $columns).") VALUES (".implode(",", $values).")";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        var_dump($this->id);
    
    }

    public function update() {
        $columns = $params = array(); 
        foreach ($this as $key => $value) {
            if (is_null($value)) continue;
            $columns[] = $key . ' =' . "?";               
            $params[] = $value;
        }
        $sql = "UPDATE {$this->getTableName()} SET ".implode(",", $columns)." WHERE id = {$this->id}";
        Db::getInstance()->execute($sql, $params);
    }

    public function delete() {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = {$this->id}";
        Db::getInstance()->execute($sql);
    }

}