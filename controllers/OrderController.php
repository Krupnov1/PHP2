<?php

namespace app\controllers;

use app\engine\Request;
use app\engine\Render;
use app\model\entities\Orders;
use app\model\repositories\OrdersRepository;

class OrderController extends Controller {

    public function actionAdd() {
        $request = new Request();
    
        $status = "Новый заказ";
    
        $name = $request->getParams()['name'];
        $phone = $request->getParams()['phone'];

        $orders = new Orders($name, $phone, session_id(), $status);
            (new OrdersRepository())->save($orders);
        
        $response = [
            'success' => 'ok',
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}