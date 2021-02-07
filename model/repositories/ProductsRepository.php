<?php

namespace app\model\repositories;

use app\engine\Db;
use app\model\Repository;
use app\engine\Session;
use app\model\entities\Products;

class ProductsRepository extends Repository {

    public function getLikesCatalog() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY likes DESC";
        return $this->getAllLikesCatalogObject($sql);
    }

    protected function getEntityClass() {
        return Products::class;
    }

    public function getTableName() {
        return 'products';
    }
}