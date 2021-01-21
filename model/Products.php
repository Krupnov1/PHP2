<?php

namespace app\model;

class Products extends Model {
    public $id;
    public $name;
    public $description;
    public $price;
    public $image_size;
    public $image_file;
    public $image_alt;
    public $likes;

    public function __construct($name = null, $description = null, $price = null, 
                                $image_size = null, $image_file = null, $image_alt = null,
                                $likes = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image_size = $image_size;
        $this->image_file = $image_file;
        $this->image_alt = $image_alt;
        $this->likes = $likes;
        
    }

    //public function getCatalog() {
        //$tableName = $this->getTableName();
        //$sql = "SELECT * FROM {$tableName} ORDER BY likes DESC";
        //return $this->getAllObject($sql);
    //}


    public function getTableName() {
        return 'products';
    }

}
