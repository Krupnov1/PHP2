<?php

namespace app\model;

class Feedback extends DbModel {
    public $id;
    public $name;
    public $texts;

    public function __construct($name = null, $texts = null)
    {
        $this->name = $name;
        $this->texts = $texts;
    }

    public static function getTableName() {
        return 'feedback';
    }
}