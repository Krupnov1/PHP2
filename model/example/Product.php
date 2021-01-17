<?php

namespace app\model\example;

abstract class Product {

    public $name;
    public $price;
    public $quantity;

    public static $income;
     
    public function __construct($name = null, $price = null, $quantity = null, $income = null)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->income = $income;
    }
    
    abstract function count();
}