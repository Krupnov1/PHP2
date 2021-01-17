<?php
include "../engine/Autoload.php";

use app\model\{Product, Users, Basket, Feedback, Menu, Orders};
use app\model\example\{DigProduct, PhysProduct, WeiProduct};
use app\engine\{Autoload, Db};


spl_autoload_register([new Autoload(), 'loadClass']);

$digProduct = new DigProduct("Цифровой", 100, 5);
$physProduct = new PhysProduct("Штучный физический", 100, 5);
$weiProduct = new WeiProduct("Весовой", 100, 5);
$digProduct->count();
$physProduct->count();
$weiProduct->count();



//echo $digProduct['income'] + $physProduct['income'] + $weiProduct['income']; 
//echo $product->getAll();
//cho '<br>';
//echo $product->getOne(1);
//echo '<br>';
//$product->delete();
var_dump($digProduct);
var_dump($physProduct);
var_dump($weiProduct);
//var_dump($summa);
//$user = new Users(new Db());
//echo $user->getAll();

//$db = new Db();
//$basket = new Basket(new Db());
//$feedback = new Feedback(new Db());
//$menu = new Menu(new Db());
//$orders = new Orders(new Db());

//var_dump($product, $user, $db, $basket, $feedback, $menu, $orders);

