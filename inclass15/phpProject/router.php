<?php

namespace phpProject;

require "../phpProject/Controllers/Control.php";

use phpProject\controllers\Control;

class router {

    public function handleRoutes() {

        //get URI without query string
        $url = strtok($_SERVER["REQUEST_URI"], '?');

        //split url into array
        $uriArray = explode("/", $url);

        $this->userRoutes($uriArray);
    }

    protected function userRoutes($uriArray) {
        if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $Control = new Control();
            $Control->getUsers();
        }

        if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $Control = new Control();
            $Control->saveUser();
        }

        if ($uriArray[1] === 'users-add' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $Control = new Control();
            $Control->viewAddUsers();
        }

        //if ($_SERVER['REQUEST_METHOD'] === 'GET') {
          //  require './views/users.html';
            exit();
        }

    }
