<?php

namespace app\model;

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
        $user = Users::getWhere('login', $login);
        if (password_verify($pass, $user->password)) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            return true;
        } else {
            return false;
        }
    }

    public static function isAuth() {
        return isset($_SESSION['login']);
    }

    public static function getName() {
        return $_SESSION['login'];
    }
    
    public static function getTableName() {
        return 'users';
    }
}