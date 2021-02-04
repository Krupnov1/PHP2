<?php

namespace app\model;

use app\engine\Db;
use app\engine\Session;

class Admin extends DbModel {

    protected $id;
    protected $name;
    protected $phone;
    protected $session_id;
    protected $status;
    

    protected $props = [
        'name' => false,
        'phone' => false,
        'session_id' => false,
        'status' => false,
    ];

    public function __construct($name = null, $phone = null, $session_id = null, $status = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->session_id = $session_id;
        $this->status = $status;
    }

    public static function getBasketOrders() {
        $tableName = static::getTableName();
        $sql = "SELECT name, phone, id_product, quantity, status, ROW_NUMBER() over (order by name) as 
        number FROM {$tableName} INNER JOIN basket on orders.session_id = basket.id_session";
        return Db::getInstance()->queryAll($sql);
    }

    public static function isAdmin() {
        $session = new Session();
        return $session->getSession('login');
    }

    public static function getTableName() {
        return 'orders';
    }
}