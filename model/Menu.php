<?php

namespace app\model;

class Menu extends Model {
    public $id;
    public $name;
    public $route;

    public function getTableName() {
        return 'menu';
    }
}
