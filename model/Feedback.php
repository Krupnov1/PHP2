<?php

namespace app\model;

class Feedback extends Model {
    public $id;
    public $name;
    public $texts;

    public function getTableName() {
        return 'feedback';
    }
}