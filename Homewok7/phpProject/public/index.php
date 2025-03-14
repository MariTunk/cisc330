<?php
require "./controllers/controllers.php";

use controllers\Note;

$controllers = new Note();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controllers->saveUser();
} else {
    require './view/form.html';
}
?>
