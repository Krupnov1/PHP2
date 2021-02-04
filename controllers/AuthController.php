<?php

namespace app\controllers;

use app\engine\Request;
use app\engine\Session;
use app\model\Users;

class AuthController extends Controller {

    public function actionLogin() {
        $request = new Request();
        $login = $request->getParams()['login'];
        $pass = $request->getParams()['pass'];
        
        if (Users::auth($login, $pass)) {
            header("Location: /");
        } else {
            echo $this->render('message', [
                'errors' => 'ERROR 404 - Неверный логин или пароль!!!'
            ]);
        }
    }

    public function actionLogout() {
        $session = new Session();
        $session->destroySession();
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}