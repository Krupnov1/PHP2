<?php
session_start();

include __DIR__ . "/../config/config.php";
include ENGINE_DIR . "/Autoload.php";

use app\engine\{Autoload, Db, Render, TwigRender, Request};
use app\model\entities\{Users, Basket, Feedback, Menu, Orders, Products, Model, DbModel};
use app\model\repositories\ProductsRepository;

//spl_autoload_register([new Autoload(), 'loadClass']);
require_once '../vendor/autoload.php';


try {

    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'product';
    $actionName = $request->getActionName();

    $controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new TwigRender());
        //$controller = new $controllerClass(new Render());
        $controller->runAction($actionName);
    }

} catch (\Exception $error) {
    var_dump($error);
}


//$product = new Products($props['name']);
//$product = (new ProductsRepository())->getOne(1);
//$products = Products::getAll();
//$product = (new ProductsRepository())->getOneObject(1);
//var_dump($product);
//$products = Products::getAllObject();
//$products = Products::getLikesCatalog();
//var_dump($products);
//var_dump(get_class_methods($products));
