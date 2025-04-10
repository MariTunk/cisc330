<?php
require_once "./models/Model.php";
require_once "./models/Henna.php";
require_once "./controllers/HennaController.php";

//set our env variables
$env = parse_ini_file('./.env');
//['DBHOST' => 'test', ]
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
//define('DBPASS', $env['DBPASS']);

use controllers\HennaController;

//get uri without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//0 = ""
//1 = users
//2 = 1


//get all or a single user
if ($uriArray[1] === 'api' && $uriArray[2] === 'henna' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    //only id
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $hennaController = new HennaController();

    if ($id) {
        $hennaController->getHennaByID($id);
    } else {
        $hennaController->getAllHenna();
    }
}

//save user
if ($uriArray[1] === 'api' && $uriArray[2] === 'henna' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $hennaController = new HennaController();
    $hennaController->saveHenna();
}

//update user
if ($uriArray[1] === 'api' && $uriArray[2] === 'henna' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $hennaController = new HennaController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $hennaController->updateHenna($id);
}

//delete user
if ($uriArray[1] === 'api' && $uriArray[2] === 'henna' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $hennaController = new HennaController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $hennaController->deleteHenna($id);
}

//views


if ($uri === '/new-item' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $hennaController = new HennaController();
    $hennaController->hennaAddView();
}

if ($uriArray[1] === 'bakery' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $hennaController = new HennaController();
    $hennaController->hennaUpdateView();
}

if ($uriArray[1] === 'delete-item' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $hennaController = new HennaController();
    $hennaController->hennaDeleteView();
}

if ($uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $hennaController = new HennaController();
    $hennaController->hennaView();
}

//include '../public/assets/views/notFound.html';
exit();

?>
