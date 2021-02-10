<?php

namespace app\model\repositories;

use app\engine\Db;
use app\model\Repository;
use app\engine\Session;
use app\model\entities\Orders;

class OrdersRepository extends Repository {

    protected function getEntityClass() {
        return Orders::class;
    }
    
    public function getTableName() {
        return 'orders';
    } 
}