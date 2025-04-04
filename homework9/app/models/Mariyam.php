<?php

namespace app\models;

class Mariyam extends Model {
    protected $table = 'henna_products';  

    // Method to get all henna products
    public function getMariyamProducts($name = null) {
        if ($name) {
            $query = "SELECT * FROM henna_products WHERE product_name LIKE :productName";
            return $this->fetchAll($query, ['productName' => '%' . $name . '%']);
        }
        $query = "SELECT * FROM henna_products"; 
        return $this->fetchAll($query);
    }

    // Method to get a henna product by ID
    public function getMariyamById($id) {
        $query = "SELECT * FROM henna_products WHERE id = :id";
        return $this->fetch($query, ['id' => $id]);
    }
}
