<?php

namespace app\controllers;

use app\models\User;  // Import correct model

class PostController
{
    public function validateUser($inputData) {
        $errors = [];

        $userName = isset($inputData['userName']) ? $inputData['userName'] : null;
        $userComments = isset($inputData['userComments']) ? $inputData['userComments'] : null;

        if ($userName) {
            $userName = htmlspecialchars($userName, ENT_QUOTES | ENT_HTML5, 'UTF-8', true);
            if (strlen($userName) < 2) {
                $errors['userNameShort'] = 'User name is too short';
            }
        } else {
            $errors['requiredUserName'] = 'User name is required';
        }

        if ($userComments) {
            $userComments = htmlspecialchars($userComments, ENT_QUOTES | ENT_HTML5, 'UTF-8', true);
            if (strlen($userComments) < 2) {
                $errors['commentShort'] = 'User comment is too short';
            }
        } else {
            $errors['requiredComment'] = 'User comment is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        return [
            'userName' => $userName,
            'userComments' => $userComments,
        ];
    }

    public function getAllUsers() {
        $userModel = new User();
        header("Content-Type: application/json");
        $users = $userModel->getAllUsers();

        echo json_encode($users);
        exit();
    }

    public function getUserByID($id) {
        $userModel = new User();
        header("Content-Type: application/json");
        $user = $userModel->getUserById($id);
        echo json_encode($user);
        exit();
    }

    public function saveUser() {
        $inputData = [
            'userName' => isset($_POST['userName']) ? $_POST['userName'] : null,
            'userComments' => isset($_POST['userComments']) ? $_POST['userComments'] : null,
        ];

        $userData = $this->validateUser($inputData);

        $user = new User();
        $user->saveUser([
            'userName' => $userData['userName'],
            'userComments' => $userData['userComments'],
        ]);

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function updateUser($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'userName' => isset($_PUT['userName']) ? $_PUT['userName'] : null,
            'userComments' => isset($_PUT['userComments']) ? $_PUT['userComments'] : null,
        ];

        $userData = $this->validateUser($inputData);

        $user = new User();
        $user->updateUser([
            'id' => $id,
            'userName' => $userData['userName'],
            'userComments' => $userData['userComments'],
        ]);

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function deleteUser($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $user = new User();
        $user->deleteUser(['userID' => $id]);

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function usersView() {
        include '../public/assets/views/user/users-view.html';
        exit();
    }

    public function usersAddView() {
        include '../public/assets/views/user/users-add.html';
        exit();
    }

    public function usersDeleteView() {
        include '../public/assets/views/user/users-delete.html';
        exit();
    }

    public function usersUpdateView() {
        include '../public/assets/views/user/users-update.html';
        exit();
    }
}
?>
