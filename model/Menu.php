<?php

namespace app\model;

class Menu extends Model {
    public $id;
    public $name;
    public $route;

    public function __construct($name = null, $route = null)
    {
        $this->name = $name;
        $this->$route = $route;
    }

    public function getTableName() {
        return 'menu';
    }
}
