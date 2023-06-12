<?php

abstract class Product
{
    protected $id;
    protected $name;
    protected $price;

    public function __construct($id, $name, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function ACalculateDiscount($percent);
}

interface Ipurchaseable
{
    public function Idescription();
}

class Clothes extends Product implements Ipurchaseable
{
    private $color;
    private $size;

    public function __construct($id, $name, $price, $color, $size)
    {
        parent::__construct($id, $name, $price);
        $this->color = $color;
        $this->size = $size;
    }
    public function ACalculateDiscount($percent)
    {
        $discount = $this->price - ($this->price * ($percent / 100));
        return $discount;
    }

    public function Idescription()
    {
        echo "id: {$this->id} <br> Name: {$this->name} <br> Price: {$this->price} <br>";
        echo "color: {$this->color} <br> size: {$this->size}";
    }
}

class Cosmetic extends Product implements Ipurchaseable
{
    private $type;

    public function __construct($id, $name, $price, $type)
    {
        parent::__construct($id, $name, $price);
        $this->type = $type;
    }
    public function ACalculateDiscount($percent)
    {
        $discount = $this->price - ($this->price * ($percent / 100));
        return $discount;
    }

    public function Idescription()
    {
        echo "id: {$this->id} <br> Name: {$this->name} <br> Price: {$this->price} <br>";
        echo "type: {$this->type}";
    }
}



$tshirt = new Clothes(1, "Blue T-shirt", 5000, "Blue", "XL");
$tshirt->Idescription();
$tshirtvalue = $tshirt->ACalculateDiscount(10);
echo "<h1>payment:</h1>";
echo $tshirtvalue;

echo "<hr>";


$toner = new Cosmetic(2, "Toner by Rose", 10000, "Toner");
$toner->Idescription();
$tonervalue = $toner->ACalculateDiscount(30);
echo "<h1>payment:</h1>";
echo $tonervalue;

echo "<hr>";

$Dress = new Clothes(3, "Toner by Rose", 50000, "Pink", "M");
$Dress->Idescription();
$dressvalue = $Dress->ACalculateDiscount(50);
echo "<h1>payment:</h1>";
echo $dressvalue;
