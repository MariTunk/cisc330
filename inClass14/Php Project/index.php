<?php

//require 'Users\mariiii\homework6/business.php';
require Php_Project\business;

//use Users\mariiii\homework6\business;

use Php_Project\business\Item;
use Php_Project\business\Henna;
//use Users\mariiii\homework6\Item;
//use Users\mariiii\homework6\Henna;

$item1 = new Item('Jagua', 32);
$item2 = new Item('Red', 10);

echo $item1->name . "<br>";
echo $item2->name . "<br>";


$henna = new Henna();
$henna->sale();
>
