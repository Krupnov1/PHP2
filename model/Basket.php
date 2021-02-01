<?php

namespace app\model;

class Basket extends DbModel {
    protected $id;
    protected $id_session;
    protected $id_product;
    protected $quantity;

    protected $props = [
        'id_session' => false,
        'id_product' => false,
        'quantity' => false
    ];

    public function __construct($id_session = null, $id_product = null, $quantity = null)
    {
        $this->id_session = $id_session;
        $this->id_product = $id_product;
        $this->quantity = $quantity;
    }

    public static function getBasketCatalog() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} INNER JOIN products on basket.id_product = products.id";
        return static::getAllBasketCatalog($sql);
    }

    public static function getTableName() {
        return 'basket';
    }
}