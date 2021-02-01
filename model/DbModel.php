<?php

namespace app\model;

use app\engine\Db;

abstract class DbModel extends Model {

    abstract public static function getTableName();

    public static function getAllBasketCatalog($sql) {
        return Db::getInstance()->queryAllBasketCatalog($sql, $params = [], static::class);
    }

    public static function getAllLikesCatalogObject($sql) {
        return Db::getInstance()->queryAllLikesCatalogObject($sql, $params = [], static::class);
    }

    public static function getAllObject() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAllObject($sql, $params = [], static::class);
    }

    public static function getOneObject($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ['id' => $id]);
    }

    public static function getLimit($page) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $page);
    }

    public static function getWhere($name, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :value";
        return Db::getInstance()->queryOneObject($sql, ['value' => $value], static::class);
    }

    public function insert() {
        $columns = [];
        $params = []; 
        foreach ($this->props as $key => $value) {                 
            $params[":{$key}"] = $this->$key;
            $columns[] = $key; 
        }
        $columns = implode(",", $columns);
        $value = implode(",",array_keys($params));
        $tableName = static::getTableName();  
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$value})";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        //var_dump($this->id);
    }

    public function update() {
        $columns = [];
        $params = []; 
        foreach ($this->props as $key => $value) {
            if (!$value) continue;
            $params[":{$key}"] = $this->$key;
            $columns[] .= "'{$key}' = :{$key}";
            $this->props[$key] = false;              
        }
        $columns = implode(",", $columns);
        $params['id'] = $this->id;
        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET ({$columns}) WHERE id = :id";
        Db::getInstance()->execute($sql, $params);
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, [':id' => $this->id]);
    }

    public function save() {
        if(is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }
}