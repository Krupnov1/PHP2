<?php

namespace app\controllers;

use app\engine\Request;
use app\engine\Render;
use app\model\entities\Orders;
use app\model\repositories\OrdersRepository;
use app\engine\App;

class OrderController extends Controller {

    public function actionAdd() {
        
        $status = "Новый заказ";
        $date = date("d/m/Y в H:i:s");
        
    
        $name = App::call()->request->getParams()['name'];
        $email = App::call()->request->getParams()['email'];
        $phone = App::call()->request->getParams()['phone'];

        $orders = new Orders($name, $email, $phone, session_id(), $date, $status);
            App::call()->ordersRepository->save($orders);
        
        $response = [
            'success' => 'ok',
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}