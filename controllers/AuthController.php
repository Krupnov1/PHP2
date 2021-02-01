<?php

namespace app\controllers;

use app\model\Users;

class AuthController extends Controller {

    public function actionLogin() {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        
        if (Users::auth($login, $pass)) {
            header("Location: /");
        } else {
            echo $this->render('message', [
                'errors' => 'ERROR 404 - Неверный логин или пароль!!!'
            ]);
        }
    }

    public function actionLogout() {
        session_destroy();
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}