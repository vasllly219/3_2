<?php
require_once 'classes.php';
$phone = new Phone('iPhone', 50000);
$phone->setWeight(0.4)
      ->setMemory(32)
      ->setDiagonal(4.7);
echo $phone->getDiscription() . '</br>';

$tv = new TV('Sony Bravia', 35000);
$tv->setWeight(7.5)
   ->setResolution('1980x1080')
   ->setDiagonal(43);
echo $tv->getDiscription() . '</br>';

$tv1 = new TV('Sony Bravia 4K', 105000);
$tv1->setWeight(17.5)
    ->setResolution('4096x2160')
    ->setDiagonal(75);
echo $tv1->getDiscription() . '</br>';

$ref = new Refrigirator('LG', 25000);
$ref->setWeight(15)
    ->setNumbersCamers(2)
    ->setVolume(950);
echo $ref->getDiscription() . '</br>';
