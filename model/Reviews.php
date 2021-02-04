<?php

namespace app\model;

class Reviews extends DbModel {
    protected $id;
    protected $name;
    protected $texts;

    protected $props = [
        'name' => false,
        'texts' => false
    ];

    public function __construct($name = null, $texts = null)
    {
        $this->name = $name;
        $this->texts = $texts;
    }

    public static function getTableName() {
        return 'feedback';
    }
}