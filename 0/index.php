<?php
require_once 'classes.php';

$cat1 = new Cat('Murka', 'female');
$cat2 = new Cat('Vaska', 'male');

$dog1 = new Dog('Muhtar', 'male');
$dog2 = new Dog('Belka', 'famale');

$house1 = new House('Lenina, 1', 5);
$house2 = new House('Petrovka, 48', 10);

$car1 = new Car('BMW', 5);
$car2 = new Car('Lada', 15);
$car3 = new Car('KIA');

$phone1 = new Phone('IPhone 5', 30000);
$phone2 = new Phone('IPhone 6', 40000);

echo 'Всего построено ' . House::$countHouses . ' дома.</br>';
echo 'На улице ' . $house1->getAdress() . ' в ' . $house1->getFloors() . '-и этажном доме живут ' . $cat1->name . ' и ' . $dog2->name . '.</br>';
echo 'А на соседней улице ' . $house2->getAdress() . ' в ' . $house2->getFloors() . '-и этажном доме живут ' . $cat2->name . ' и ' . $dog1->name . '.</br>';
echo 'В этом маленьком городке есть ' . Car::$countCars . ' машины.';
