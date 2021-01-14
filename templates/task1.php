<h3>1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п. 
	или любой другой области. Опишите свойства и методы, придумайте наследника, расширяющего функционал родителя. Приведите пример использования. ВАЖНОЕ!!!.
</h3>

<?php

class Chocolate 
{
	public $type;
	public $brand;
	public $mass;
	protected $milk;

	public function __construct($type = null, $brand = null, $mass = null, $milk = null) 
	{
		$this->type = $type;
		$this->brand = $brand;
		$this->mass = $mass;
		$this->milk = $milk;
	}

	public function toСonsist() 
	{
		echo $this->type . " шоколад " . $this->brand . " содержит в своём составе " . $this->milk;
	}
}

class NutChocolate extends Chocolate {
	public $nuts;

	public function __construct($type = null, $brand = null, $mass = null, $milk = null, $nuts = null)
	{
		parent::__construct($type, $brand, $mass, $milk);
		$this->nuts = $nuts;
	}

	public function addNut() 
	{
		parent::toСonsist();
		echo " и в него добавлены " . $this->nuts;
	}
}

class RaisinChocolate extends NutChocolate {
	public $raisin;

	public function __construct($type = null, $brand = null, $mass = null, $milk = null, $nuts = null, $raisin = null)
	{
		parent::__construct($type, $brand, $mass, $milk, $nuts);
		$this->raisin = $raisin;
	}

	public function addRaisin() 
	{
		parent::addNut();
		echo "," . " а так-же " . $this->raisin . "<br>";
	}

}

$chocolate = new Chocolate("Молочный", "Milka", 100, "молоко.");
$chocolate2 = new NutChocolate("Молочный с фундуком", "Alpen Gold", 90, "молоко", "орехи." );
$chocolate3 = new RaisinChocolate("Молочный с фундуком и изюмом", "O'zera", 90, "молоко", "орехи", "изюм.");

$chocolate->toСonsist();
echo"<br>";
$chocolate2->addNut();
echo"<br>";
$chocolate3->addRaisin();


