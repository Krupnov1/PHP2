<?php

namespace app\model\repositories;

use app\engine\Db;
use app\model\Repository;
use app\engine\Session;

class ReviewsRepository extends Repository {

    protected function getEntityClass() {
        return Reviews::class;
    }
    
    public function getTableName() {
        return 'feedback';
    }
}