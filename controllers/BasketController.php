<?php

namespace app\controllers;

use app\engine\Request;
use app\model\Basket;

class BasketController extends Controller {

    public function actionAll() {
        echo $this->render('basket', [
            'basket' => Basket::getBasketCatalog(session_id()),
            'sum' => Basket::getBasketSum(session_id()),
            'title' => 'Корзина'
        ]); 
    }

    public function actionAdd() {
        $request = new Request();
        
        $id_product = $request->getParams()['id'];
        $quantity_product = $request->getParams()['quantity'];

        $basket = Basket::getBasketProduct($id_product, session_id());
        
        if ($basket == NULL) {
            (new Basket(session_id(), $id_product, $quantity_product))->save();      
        } else {
            foreach ($basket as $item) {
                $new_quantity = $quantity_product + $item['quantity'];
            }
            Basket::quantityAdd($id_product, $new_quantity);
        } 
        
        $response = [
            'success' => 'ok',
            'count' => Basket::getCountWhere('id_session', session_id())
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function actionEdit() {
        $request = new Request();

        $id_product = $request->getParams()['id_product'];
        $quantity = $request->getParams()['quantity'];

        Basket::quantityAdd($id_product, $quantity);

        $response = [
            'success' => 'ok',
            'count' => Basket::getCountWhere('id_session', session_id())
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function actionDelete() {
        $request = new Request();
        
        $id = $request->getParams()['id_basket'];
        $quantity = $request->getParams()['quantity'];
        $id_product = $request->getParams()['id_product'];
        
        if ($quantity == 1) {
            $session = session_id();
            $basket = Basket::getOneObject($id);

            if ($session == $basket->id_session) {
                $basket->delete();
            }

        } else {
            $new_quantity = $quantity - 1;
            Basket::quantityAdd($id_product, $new_quantity);
        }

        $response = [
            'success' => 'ok',
            'count' => Basket::getCountWhere('id_session', session_id())
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
} 
