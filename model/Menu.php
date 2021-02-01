<?php

namespace app\model;

class Menu extends DbModel {
    protected $id;
    protected $name;
    protected $route;

    protected $props = [
        'name' => false,
        'route' => false
    ];

    public function __construct($name = null, $route = null)
    {
        $this->name = $name;
        $this->route = $route;
    }

    public static function getTableName() {
        return 'menu';
    }
}
