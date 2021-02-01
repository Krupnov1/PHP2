<?php

namespace app\controllers;

use app\model\Basket;

class BasketController extends Controller {

    public function actionAll() {
        $basket = Basket::getBasketCatalog();
        echo $this->render('basket', [
           'basket' => $basket,
           'title' => 'Корзина'
        ]); 
    }
} 
