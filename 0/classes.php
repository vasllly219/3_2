<?php
interface GetAge
{
  public function getAge();
}

interface ConstructAnimals
{
  public function __construct($name, $gender);
}

interface ConstructHouse
{
  public function __construct($adress, $floors);
}

interface ConstructCar
{
  public function __construct($brand, $acceleration);
}

interface ConstructPhone
{
  public function __construct($name, $price);
}


class Animals implements GetAge, ConstructAnimals // суперкласс
{
  public $name;
  protected $gender;
  protected $color;
  protected $weight;
  protected $birthday;

  public function __construct($name, $gender)
  {
    $this->name = $name;
    $this->gender = $gender;
    $this->birthday = time();
  }

  public function setBirthday($birthday)
  {
    $this->birthday = $birthday;
  }

  public function getGender()
  {
    return $this->gender;
  }

  public function getColor()
  {
    return $this->color;
  }

  public function getWeight()
  {
    return $this->weight;
  }

  public function getAge()
  {
    return round((time() - $this->birthday) / 60 / 60 / 365);
  }
}

class Cat extends Animals
{
  protected $color = 'white';
  protected $weight = 0.5;
}

class Dog extends Animals
{
  protected $color = 'black';
  protected $weight = 1;
}

class House implements ConstructHouse
{
  public static $countHouses = 0;

  private $adress;
  private $floors;
  public $color = 'white';

  public function __construct($adress, $floors)
  {
    self::$countHouses++;
    $this->adress = $adress;
    $this->floors = $floors;
  }

  public function getAdress()
  {
    return $this->adress;
  }

  public function getFloors()
  {
    return $this->floors;
  }
}

class Car implements ConstructCar
{
  public static $countCars = 0;

  public $color = 'white';
  private $brand;
  private $acceleration;
  private $speed = 0;
  private $maxSpeed = 180;

  public function __construct($brand, $acceleration = 10)
  {
    self::$countCars++;
    $this->brand = $brand;
    $this->acceleration = $acceleration;
  }

  public function getBrand()
  {
    return $this->brnd;
  }

  public function accelerate($time)
  {
    $this->speed = $this->speed + $this->acceleration * $time;
    if ($this->speed > $this->maxSpeed){
      $this->speed = $this->maxSpeed;
    }
  }

  public function braking($time)
  {
    $this->speed = $this->speed - $this->acceleration * $time;
    if ($this->speed < 0){
      $this->speed = 0;
    }
  }

  public function getSpeed()
  {
    return $this->speed;
  }
}

class Phone implements ConstructPhone
{
  private $name;
  private $price;
  private $color = 'black';
  public $number;

  public function __construct($name, $price)
  {
    $this->name = $name;
    $this->price = $price;
  }
}
