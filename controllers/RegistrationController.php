<?php

namespace app\controllers;

use app\model\Users;

class RegistrationController extends Controller {


    public function actionForm() {
        echo $this->render('users', [
           'title' => 'Регистрация пользователя'
        ]); 
    }

    public function actionUser() {
        $user_name = $_POST['name'];
	    $user_last_name = $_POST['last_name'];
	    $user_email = $_POST['email'];
	    $user_tel = $_POST['tel'];
	    $user_login = $_POST['login'];
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        
        if ($user_name == '' || $user_last_name == '' || $user_email == '' || $user_tel == '' || $user_login == '' || $pass == '') {
            echo $this->render('message', [
                'message' => 'ERROR 404 - Все поля формы должны быть заполнены!!!'
            ]);
        } else {
            $user = new Users($user_name, $user_last_name,
            $user_email, $user_tel, $user_login, $pass
            );
            $user->insert();
            header("Location:" . $_SERVER['HTTP_REFERER']);   
        }
    }
} 