<?php

namespace app\model\example;

class PhysProduct extends Product {

    public function count()
    {
        $this->income = ($this->price * $this->quantity);
        echo $this->name . " товар стоит " . $this->income . " рублей. " . "<br>";
    }    
}