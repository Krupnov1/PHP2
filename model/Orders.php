<?php

namespace app\model;

class Orders extends Model {
    public $id;
    public $name;
    public $phone;
    public $session_id;
    public $status;

    public function __construct($name = null, $phone = null, $session_id = null, 
                                $status = null)
    {
        $this->name = $name;
        $this->$phone = $phone;
        $this->$session_id = $session_id;
        $this->$status = $status;
    }

    public function getTableName() {
        return 'orders';
    }
}