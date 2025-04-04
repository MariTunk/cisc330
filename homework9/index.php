<?php
require_once "./app/models/Model.php";         
require_once "./app/models/Mariyam.php";
require_once "./app/controllers/MariyamController.php";

// Set environment variables
$env = parse_ini_file('./.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\MariyamController;

// Get URI without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $uri);

// Debugging - Print the URI and URI Array
echo "<pre>";
print_r($uri);
print_r($uriArray);
echo "</pre>";


// Default to homepage view
if ($uri === '/' || $uriArray[1] === '') {
    include './public/views/page.html'; // Your main page view
    exit();
}

// API routes
if ($uriArray[1] === 'api' && $uriArray[2] === 'mariyam' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $mariyamController = new MariyamController();

    if ($id) {
        $mariyamController->getMariyamByID($id);
    } else {
        $mariyamController->getMariyamProducts(); // Call for getting all products
    }
    exit();
}

// Views - Handle Mariyam page
if ($uriArray[1] === 'mariyam' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $mariyamController = new MariyamController();

    if (isset($uriArray[2]) && $uriArray[2] === 'details') {
        $mariyamController->mariyamDetailsView();
    } else {
        $mariyamController->mariyamProductsView(); // Call for the main page view
    }
    exit();
}

// Include 404 page if route not matched
echo "Route not found!";
exit();
