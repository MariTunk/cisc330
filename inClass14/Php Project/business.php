<?php

namespace Php_Project\business;


//namespace Users\mariiii\homework6;

class Item {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function toJson() {
        return json_encode([
            'name' => $this->name,
            'price' => $this->price
        ]);
    }
}

 class Henna {
    public function sale() {
        echo "Item has been sold.";
    }
}
>
