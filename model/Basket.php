<?php

namespace app\model;

class Basket extends Model {
    public $id;
    public $id_session;
    public $id_product;
    public $quantity;

    public function getTableName() {
        return 'basket';
    }
}