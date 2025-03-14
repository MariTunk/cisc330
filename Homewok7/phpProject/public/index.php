<?php
require "../controllers/controllers.php";
use controller\Note;

$controller = new Note();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->saveUser();
} else {
    require './public/view/form.html';
}
