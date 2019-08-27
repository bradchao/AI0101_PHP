<?php
class Bike{
    // Fields
    protected $speed = 0;   // this class and extend subclass

    // Method
    function upSpeed(){
        $this->speed = $this->speed<1 ? 1 : $this->speed*1.2;
    }

    function downSpeed(){
        $this->speed = $this->speed<1 ? 0 :$this->speed*0.7;
    }

    function getSpeed(){
        return $this->speed;
    }
}
// Scooter is-a Bike
class Scooter extends Bike {
    private $gear = 0;

    function chGear($gear = 1){
        $this->gear = $gear;
    }

    // Override 覆寫
    function upSpeed(){
        $this->speed = $this->speed<1 ? 1 : $this->speed*($this->gear*1.2);
    }
}

class Person {
    // has-a
    private $bike, $scooter, $name;
    // 建構式, 建構子, 建構方法 => Constructor
    function __construct($name){
        $this->bike = new Bike;
        $this->scooter = new Scooter;
        $this->name = $name;
    }
    // getter, setter
    function getName(){
        return $this->name;
    }
    function getBike(){
        return $this->bike;
    }
    function getScooter(){
        return $this->scooter;
    }
}

class Member {
    public $name, $id, $gender, $twid;
}

$b1 = new Bike;
$b2 = new Bike;
$b1->upSpeed();
$b1->upSpeed();
$b1->upSpeed();
echo $b1->getSpeed()  . ':' . $b2->getSpeed() . '<br>';
//$b2->speed = 5;
for ($i=0; $i<10; $i++){
    $b2->upSpeed();
}
echo $b1->getSpeed()  . ':' . $b2->getSpeed() . '<br>';

$s1 = new Scooter;
$s1->chGear(3);
$s1->upSpeed();
echo $s1->getSpeed() . '<br>';
$s1->upSpeed();
echo $s1->getSpeed() . '<br>';
$s1->upSpeed();
echo $s1->getSpeed() . '<br>';
$s1->upSpeed();
echo $s1->getSpeed() . '<br>';

$brad = new Person('Brad');
$eric = new Person('Eric');
$brad->getBike()->upSpeed();
$brad->getBike()->upSpeed();
$brad->getBike()->upSpeed();

$eric->getBike()->upSpeed();
$eric->getBike()->upSpeed();
$eric->getBike()->downSpeed();

echo $brad->getName() . ":" . $brad->getBike()->getSpeed() . "<br>";
echo $eric->getName() . ":" . $eric->getBike()->getSpeed() . "<br>";

var_dump($brad);


?>