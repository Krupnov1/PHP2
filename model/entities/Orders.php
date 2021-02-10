<?php

namespace app\model\entities;

use app\model\Model;

class Orders extends Model {
    protected $id;
    protected $name;
    protected $email;
    protected $phone;
    protected $session_id;
    protected $date;
    protected $status;

    protected $props = [
        'name' => false,
        'email' => false,
        'phone' => false,
        'session_id' => false,
        'date' => false,
        'status' => false
    ];

    public function __construct($name = null, $email = null, $phone = null, $session_id = null, 
                                $date = null, $status = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->session_id = $session_id;
        $this->date = $date;
        $this->status = $status;
    }
}