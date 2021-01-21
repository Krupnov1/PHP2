<?php

//include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include __DIR__ . "/../config/config.php";
include ENGINE_DIR;


use app\engine\{Autoload, Db};
use app\model\{Product, Users, Basket, Feedback, Menu, Orders, Products};

spl_autoload_register([new Autoload(), 'loadClass']);



$product = new Product("Чай", "Цейлонский", 25);
//$product->insert();

$product->name = "Чай_2";
//$product->update();

//$product->delete();
var_dump($product->getAll());
var_dump($product->getOneObject(44));











//var_dump($product->insert());
//$products = new Products();
//var_dump($products);
//var_dump($products->getOne(1));
//var_dump($products->getOneObject(1));
//var_dump($products->getAllObject());
//var_dump($products->getCatalog());

//$user = new Users();
//var_dump($user->getOneObject(1));

//$basket = new Basket();
//var_dump($basket->getOneObject(1));
//var_dump(get_class_methods($basket));

//var_dump($product->update());
//var_dump($product->getOneObject(2));
//$product->delete();

//die();
//CREATE
//$products = new Products("Чай", "Цейлонский", 25);
//$products->insert();

//READ
//$products = new Products();
//$products->getOne(4);

//UPDATE
//$products->name = "Чай_2";
//$products->update();

//DELETE
//$products->delete();



//$feedback = new Feedback(new Db());
//$menu = new Menu(new Db());
//$orders = new Orders(new Db());

//var_dump($product, $user, $basket, $feedback, $menu, $orders);

