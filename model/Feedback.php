<?php

namespace app\model;

class Feedback extends Model {
    public $id;
    public $name;
    public $texts;

    public function __construct($name = null, $texts = null)
    {
        $this->name = $name;
        $this->$texts = $texts;
    }

    public function getTableName() {
        return 'feedback';
    }
}