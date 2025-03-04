<?php

require 'Users\mariiii\homework6/business.php';

//use Users\mariiii\homework6\business;


use Users\mariiii\homework6\Item;
use Users\mariiii\homework6\Henna;

$item1 = new Item('Jagua', 32);
$item2 = new Item('Red', 10);

echo $item1->name . "<br>";
echo $item2->name . "<br>";


$henna = new Henna();
$henna->sale();
>
