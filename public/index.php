<?php

//include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include __DIR__ . "/../config/config.php";
include ENGINE_DIR . "/Autoload.php";

use app\engine\{Autoload, Db};
use app\model\{Product, Users, Basket, Feedback, Menu, Orders, Products};

spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product' ?: 'basket';
$actionName = $_GET['a'];
$controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName); 
}



//$products = Products::getOne(1);
//$products = Products::getAll();
//$products = Products::getOneObject(1);
//$products = Products::getAllObject();
//$products = Products::getLikesCatalog();
//var_dump($products);
//var_dump(get_class_methods($products));


//$users = Users::getOne(1);
//$users = Users::getAll();
//$users = Users::getOneObject(1);
//$users = Users::getAllObject();
//var_dump($users);
//var_dump(get_class_methods($users));


//$basket = Basket::getOne(1);
//$basket = Basket::getAll();
//$basket = Basket::getOneObject(1);
//$basket = Basket::getAllObject();
//var_dump($basket);
//var_dump(get_class_methods($basket));


//$menu = Menu::getAll();
//var_dump($menu);

//$product = new Product("Чай", "Цейлонский", 25);
//var_dump($product);
//$product->insert();
//$product->save();
//var_dump($product->getOne(1));
//var_dump($product->getAll());
//var_dump($product->getOneObject(44));

//$product = new Product();
//$product->name = "Чай_2";
//var_dump($product);
//$key = array_search('Чай_2', $product);
//$product->save();
//var_dump($product->update());

//$product->delete();



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


