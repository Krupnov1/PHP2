<?php

namespace app\model;

class Products extends DbModel {
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $image_size;
    protected $image_file;
    protected $image_alt;
    protected $likes;

    protected $props = [
        'name' => false,
        'description' => false,
        'price' => false,
        'image_size' => false,
        'image_file' => false,
        'image_alt' => false,
        'likes' => false
    ];

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

    public static function getLikesCatalog() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY likes DESC";
        return static::getAllLikesCatalogObject($sql);
    }


    public static function getTableName() {
        return 'products';
    }

}
