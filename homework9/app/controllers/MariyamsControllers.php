<?php
namespace app\controllers;

use app\models\Mariyam;

class MariyamController {
    // Get all henna products or search based on query
    public function getMariyamProducts() {
        $mariyamModel = new Mariyam();
        $query = !empty($_GET['productName']) ? $_GET['productName'] : null;
        $products = $mariyamModel->getMariyamProducts($query);
        echo json_encode($products);
        exit();
    }

    // Get a specific henna product by ID
    public function getMariyamByID($id) {
        $mariyamModel = new Mariyam();
        $product = $mariyamModel->getMariyamById($id);
        echo json_encode($product);
        exit();
    }

    // Display the main products page (View all products)
    public function mariyamProductsView() {
        include './public/views/page.html';  // Your main page view
        exit();
    }

   
}
