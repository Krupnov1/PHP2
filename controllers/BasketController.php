<?php

namespace app\controllers;

use app\model\Basket;

class BasketController extends Controller {

    public function actionBasket() {
        $basket = Basket::getBasketCatalog();
        echo $this->render('basket', [
           'basket' => $basket,
           'title' => 'Корзина'
        ]); 
    }
} 
