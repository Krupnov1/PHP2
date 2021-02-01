<?php

namespace app\controllers;


class AdminController extends Controller {

    public function actionManagement() {
        //$admin = Admin::getBasketCatalog();
        echo $this->render('admin', [
           //'admin' => $admin,
           'title' => 'Админ'
        ]); 
    }
} 