<?php

namespace app\controllers;

use app\model\Admin;
use app\model\repositories\AdminRepository;

class AdminController extends Controller {

    public function actionManagement() {
        echo $this->render('admin', [
           'admin' => (new AdminRepository())->getBasketOrders(),
           'title' => 'Админ'
        ]); 
    }
} 