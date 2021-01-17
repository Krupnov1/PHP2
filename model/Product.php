<?php

namespace app\model;

class Product extends Model {
    public $id;
    public $name;
    public $description;
    public $price;
    public $image_size;
    public $image_file;
    public $image_alt;
    public $likes;


    public function getTableName() {
        return 'product';
    }

}
