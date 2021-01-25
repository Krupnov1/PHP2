<?php

namespace app\model;

class Users extends DbModel{

    public $id;
    public $name;
    public $last_name;
    public $email;
    public $telephone;
    private $login;
    private $password;

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
    

    public static function getTableName() {
        return 'users';
    }
}