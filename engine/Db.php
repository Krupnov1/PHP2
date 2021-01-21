<?php

namespace app\engine;

use app\traits\TSingletone;

use PDO;

class Db {

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost:3308',
        'login' => 'root',
        'password' => 'root',
        'database' => 'shop',
        'charset' => 'utf8'
    ];

    use TSingletone;

    protected $connection = null; //PDO

    protected function getConnection() {
        if (is_null($this->connection)) {
            var_dump("Подключаюсь к БД!");
            $this->connection = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'], 
                $this->config['password']);
            $this->connection->setAttribute(\PDO::
                ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    public function lastInsertId() {
        $this->id = $this->connection->lastInsertId();
        return $this->id; 
    }
    
    protected function prepareDsnString() {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    //sql = "SELECT FROM ... WHERE id = :id
    //$params = ['id' => 1]
    protected function query($sql, $params) {
        //var_dump($sql, $params);
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function queryOne($sql, $params) {
        return $this->query($sql, $params)->fetch();
    }

    public function queryOneObject($sql, $params, $class) {
        $stmt = $this->query($sql, $params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $class);
        $oneObj = $stmt->fetch();
        return $oneObj;   
    }

    public function queryAllObject($sql, $params = [], $class) {
        $stmt = $this->query($sql, $params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $class);
        $allObj = $stmt->fetchAll();
        return $allObj;
    }

    public function queryAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute($sql, $params = []) {
        return $this->query($sql, $params)->rowCount(); 
    }
}