<?php

namespace app\model\repositories;

use app\engine\Db;
use app\engine\App;
use app\model\Repository;
use app\engine\Session;
use app\model\entities\Admin;

class AdminRepository extends Repository { 

    public function isAdmin() {
        $session = new Session();
        return $session->getSession('login');
    }

    public function getBasketOrders() {
        if ($this->isAdmin()) {
            $tableName = $this->getTableName();
            $sql = "SELECT orders.id, name, email, phone, id_product, quantity, date, status, ROW_NUMBER() over (order by name) as 
            number FROM {$tableName} INNER JOIN basket on orders.session_id = basket.id_session";
            return App::call()->db->queryAll($sql);
        } else {
            header("Location: /");
        }
        
    }

    protected function getEntityClass() {
        return Admin::class;
    }

    public function statusEdit($id, $status) {
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET status = :status WHERE id = :id"; 
        App::call()->db->execute($sql, [
            'status' => $status,
            'id' => $id
            ]);
    }

    public function getTableName() {
        return 'orders';
    }
}