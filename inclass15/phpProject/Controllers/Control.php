<?php

namespace phpProject\Controllers;

require "../phpProject/Controllers/Names.php";

use phpProject\Models\User;

class UserController
{
    public function getUsers() {
        $params = [
            'name' => $_GET['name'] ?? null,
        ];
        $userModel = new User();
        $users = $userModel->getAllUsersByName($params);
        echo json_encode($users);
        exit();
    }
}
