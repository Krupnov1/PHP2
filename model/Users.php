<?php

namespace app\model;

use app\engine\Session;

class Users extends DbModel{

    protected $id;
    protected $name;
    protected $last_name;
    protected $email;
    protected $telephone;
    protected $login;
    protected $password;

    protected $props = [
        'name' => false,
        'last_name' => false,
        'email' => false,
        'telephone' => false,
        'login' => false,
        'password' => false
    ];

    public function __construct($name = null, $last_name = null, $email = null, 
                                $telephone = null, $login = null, $password = null)
    {
        $this->name = $name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->login = $login;
        $this->password = $password;  
    }

    public static function auth($login, $pass) {
        $session = new Session();
        $user = Users::getWhere('login', $login);
        if (password_verify($pass, $user->password)) {
            $session->setSession('login', $login);
            $session->setSession('id', $user->id);
            return true;
        } else {
            return false;
        }
    }

    public static function isAuth() {
        $session = new Session();
        return $session->getSession('login');
    }

    public static function getName() {
        $session = new Session();
        return $session->getSession('login'); 
    }
    
    public static function getTableName() {
        return 'users';
    }
}