<?php

namespace phpProject\Controllers;

require "../phpProject/Models/Names.php";

use phpProject\Models\user;

class UserController
{
    public function getUsers() {
        $params = [
            'Guest' => $_GET[Guest],
            'name' => $_GET['name'] ?? null,
        ];
        $userModel = new User();
        $users = $userModel->getAllUsersByName($params);
        echo json_encode($users);
        exit();
    }
}
