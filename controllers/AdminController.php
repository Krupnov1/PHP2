<?php

namespace app\controllers;

use app\model\Admin;

class AdminController extends Controller {

    public function actionManagement() {
        echo $this->render('admin', [
           'admin' => Admin::getBasketOrders(),
           'title' => 'Админ'
        ]); 
    }
} 