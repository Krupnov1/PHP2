<?php

namespace app\model;

class Basket extends Model {
    public $id;
    public $id_session;
    public $id_product;
    public $quantity;

    /*public function __construct($id_session = null, $id_product = null, $quantity = null)
    {
        $this->$id_session = $id_session;
        $this->$id_product = $id_product;
        $this->$quantity = $quantity;
    }*/

    public function getTableName() {
        return 'basket';
    }
}