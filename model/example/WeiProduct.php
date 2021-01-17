<?php

namespace app\model\example;

class WeiProduct extends Product {

    public function count()
    {
        if ($this->quantity < 3) {
            $this->income = ($this->price * $this->quantity); 
        } else {
            $this->income = ($this->price * 0.95 * $this->quantity);
        }
        echo $this->name . " товар стоит " . $this->income . " рублей за " . $this->quantity . " кг." . "<br>";  
    }
}