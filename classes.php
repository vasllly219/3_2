<?php
interface InterfaceProduct
{
  public function __construct($title, $price);
  public function setWeight($weight);
  public function getTitle();
}

trait GetPriceDiscount
{
  public function getPrice()
  {
    return $this->price * (100 - $this->discount) / 100;
  }
}

trait GetPriceWeight
{
  public function getPrice()
  {
    if ($this->weight > 10)
    {
      return $this->price * (100 - $this->discount) / 100;
    }
    return $this->price;
  }
}

abstract class Product implements InterfaceProduct
{
  protected $title;
  protected $price;
  protected $weight;
  protected $discount = 10;
  protected $delivery = 300;

  public function __construct($title, $price)
  {
    $this->title = $title;
    $this->price = $price;
  }

  public function setWeight($weight)
  {
    $this->weight = $weight;
    return $this;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setDiscription(array $discriptionArray)
  {
    $discription = $discriptionArray[0];
    if (isset($discriptionArray[3]) || isset($discriptionArray[7]))
    {
      $discription = $discription . $discriptionArray[1];
    }
    if (isset($discriptionArray[3]))
    {
      $discription = $discription . $discriptionArray[2]. $discriptionArray[3] . $discriptionArray[4];
    }
    if (isset($discriptionArray[3]) && isset($discriptionArray[7]))
    {
      $discription = $discription . $discriptionArray[5];
    }
    if (isset($discriptionArray[7]))
    {
      $discription = $discription . $discriptionArray[6] . $discriptionArray[7] . $discriptionArray[8];
    }
    if ((isset($discriptionArray[3]) || isset($discriptionArray[7])) && isset($discriptionArray[11]))
    {
      $discription = $discription . $discriptionArray[9];
    }
    if (isset($discriptionArray[11]))
    {
      $discription = $discription . $discriptionArray[10]. $discriptionArray[11]. $discriptionArray[12];
    }
    $discription = $discription . $discriptionArray[13] . $discriptionArray[14] . $discriptionArray[15] . $discriptionArray[16] . $discriptionArray[17] . $discriptionArray[18];
    return $discription;
  }

  abstract public function getDiscription();
  abstract public function getPrice();
}

class Phone extends Product
{
  use GetPriceDiscount;

  private $diagonal;
  private $memory;

  public function setDiagonal($diagonal)
  {
    $this->diagonal = $diagonal;
    return $this;
  }

  public function setMemory($memory)
  {
    $this->memory = $memory;
    return $this;
  }

  public function getDiscription()
  {
    $summa = $this->getPrice() + $this->delivery;
    if (isset($this->weight)){$weight = $this->weight * 1000;}else{$weight = NULL;}
    $discriptionArray = ["Телефон {$this->title}", " оснащен ", "", $this->diagonal, " дюймовым дисплеем", " и", " ", $this->memory, " Gb памяти", " и", " весит всего ", $weight, " грамм", ". Цена с учетом скидки: ", $this->getPrice(), " + доставка: ", $this->delivery, ". Итого: ", $summa];
    return $this->setDiscription($discriptionArray);
  }
}

class TV extends Product
{
  use GetPriceWeight;

  private $diagonal;
  private $resolution;

  public function setDiagonal($diagonal)
  {
    $this->diagonal = $diagonal;
    return $this;
  }

  public function setResolution($resolution)
  {
    $this->resolution = $resolution;
    return $this;
  }

  private function setDelivery()
  {
    if ($this->weight > 10)
    {
      $this->delivery = 250;
    }
  }

  public function getDiscription()
  {
    $this->setDelivery();
    $summa = $this->getPrice() + $this->delivery;
    $discriptionArray = ["Телевизор {$this->title}", " c", " диаганалью ", $this->diagonal, " дюймов", " и", " максимальным разрешением экрана ", $this->resolution, "", ",", " весит ", $this->weight, " кг", ". Цена с учетом скидки: ", $this->getPrice(), " + доставка: ", $this->delivery, ". Итого: ", $summa];
    return $this->setDiscription($discriptionArray);
  }
}

class Refrigirator extends Product
{
  use GetPriceDiscount;

  private $volume;
  private $numbersCamers;

  public function setVolume($volume)
  {
    $this->volume = $volume;
    return $this;
  }

  public function setNumbersCamers($numbersCamers)
  {
    $this->numbersCamers = $numbersCamers;
    return $this;
  }

  public function getDiscription()
  {
    $summa = $this->getPrice() + $this->delivery;
    $discriptionArray = ["Холодильник {$this->title}", " оснащен ", "", $this->numbersCamers, " камерами", ",", " общим обьемом ", $this->volume, " литров", " и", " весит ", $this->weight, " кг", ". Цена с учетом скидки: ", $this->getPrice(), " + доставка: ", $this->delivery, ". Итого: ", $summa];
    return $this->setDiscription($discriptionArray);
    return $discription;
  }
}
