<?php

namespace app\model\example;

class DigProduct extends Product 
{
    public function count()
    {
       $this->income = (($this->price / 2) * $this->quantity);
       echo $this->name . " товар стоит " . $this->income . " рублей. " . "<br>"; 
    }
}