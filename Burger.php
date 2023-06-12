<?php
class Food {
    protected $name;

    public function __construct($name) {
        $this->name =$name;
    }

    public function process() {
        echo $this->name." Burger is being prepared. <br>";

    }
 
}


class Burger extends Food {
    public function __construct($name)  {
        parent::__construct($name);
    }

    public function preparing()
    { 
        echo "Here are the topping you add <br>";
        return new Hamburger();
    }
}

class Hamburger{
    private $toppings;
  private $sauces;

  public function __construct() {
    $this->toppings = array();
    $this->sauces = array();
  }

  public function addTopping($topping) {
    $this->toppings[] = $topping;
  }

  public function addSauce($sauce) {
    $this->sauces[] = $sauce;
  }

  public function getToppings() {
    return $this->toppings;
  }

  public function getSauces() {
    return $this->sauces;
  }
}



$burger = new Burger("Cheese");

$burger->process();

$hamburger = $burger->preparing();

$hamburger->addTopping("Lettuce");
$hamburger->addTopping("Tomato");
$hamburger->addTopping("Cheese");


$hamburger->addSauce("Ketchup");
$hamburger->addSauce("Mustard");

$toppings = $hamburger->getToppings();
$sauces = $hamburger->getSauces();

echo "Toppings: ";
foreach ($toppings as $topping) {
  echo $topping . ", ";
}
echo "<br>";

echo "Sauces: ";
foreach ($sauces as $sauce) {
  echo $sauce . ", ";
}
echo "<br>";

