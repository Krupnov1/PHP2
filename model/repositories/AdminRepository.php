<?php

namespace app\model\repositories;

use app\engine\Db;
use app\model\Repository;
use app\engine\Session;
use app\model\entities\Admin;

class AdminRepository extends Repository {

    public function getBasketOrders() {
        $tableName = $this->getTableName();
        $sql = "SELECT name, phone, id_product, quantity, status, ROW_NUMBER() over (order by name) as 
        number FROM {$tableName} INNER JOIN basket on orders.session_id = basket.id_session";
        return Db::getInstance()->queryAll($sql);
    }

    public function isAdmin() {
        $session = new Session();
        return $session->getSession('login');
    }

    protected function getEntityClass() {
        return Admin::class;
    }

    public function getTableName() {
        return 'orders';
    }
}