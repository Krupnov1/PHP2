<?php

namespace app\model;

class Users extends Model{

    public $id;
    public $name;
    public $last_name;
    public $email;
    public $telephone;
    private $login;
    private $password;
    

    public function getTableName() {
        return 'users';
    }
}