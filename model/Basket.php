<?php

namespace app\model;

use app\engine\Db;

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

    public static function getBasketCatalog($session_id) {
        $tableName = static::getTableName();
        $sql = "SELECT basket.id as id_basket, id_session, id_product, quantity, 
                products.id, products.name, products.description, price, image_size, image_file, image_alt, likes  
                FROM {$tableName} INNER JOIN products on products.id = basket.id_product WHERE id_session = :session";
        return Db::getInstance()->queryAll($sql, ['session' => session_id()]);
    }

    public static function getBasketProduct($id_product, $session_id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id_product = :id_product";
        return Db::getInstance()->queryAll($sql, ['id_product' => $id_product]);
    }

    public static function quantityAdd($id_product, $new_quantity) {
        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET quantity = :quantity WHERE id_product = :id_product";
        Db::getInstance()->execute($sql, [
            'quantity' => $new_quantity,
            'id_product' => $id_product 
            ]);
    }

    public static function getBasketSum($session_id) {
        $tableName = static::getTableName();
        $sql = "SELECT sum(price * quantity) as sum FROM {$tableName} INNER JOIN products on 
        basket.id_product = products.id WHERE id_session = :session";
        return Db::getInstance()->queryAll($sql, ['session' => session_id()]);
    }
    
    public static function getTableName() {
        return 'basket';
    }
}
