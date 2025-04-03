<?php
namespace app\controllers;

use app\models\User;

class PostController
{
    public function validateUser($inputData) {
        $errors = [];
        $userName = isset($inputData['userName']) ? htmlspecialchars($inputData['userName'], ENT_QUOTES|ENT_HTML5, 'UTF-8') : '';
        $userComments = isset($inputData['userComments']) ? htmlspecialchars($inputData['userComments'], ENT_QUOTES|ENT_HTML5, 'UTF-8') : '';

        if (!$userName || strlen($userName) < 2) {
            $errors['userNameShort'] = 'User name is too short';
        }

        if (!$userComments || strlen($userComments) < 2) {
            $errors['commentShort'] = 'User comment is too short';
        }

        if (!empty($errors)) {
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
        echo json_encode($userModel->getAllUsers());
        exit();
    }

    public function getUserByID($userID) {
        if (!$userID) {
            http_response_code(400);
            exit();
        }
        $userModel = new User();
        header("Content-Type: application/json");
        echo json_encode($userModel->getUserById($userID)); // ✅ Fixed variable
        exit();
    }

    public function saveUser() {
        $inputData = [
            'userName' => isset($_POST['userName']) ? $_POST['userName'] : null,
            'userComments' => isset($_POST['userComments']) ? $_POST['userComments'] : null,
        ];
        $userData = $this->validateUser($inputData);

        $user = new User();
        $user->saveUser($userData);

        http_response_code(201);
        echo json_encode(['success' => true]);
        exit();
    }

    public function updateUser($userID) {
        if (!$userID) {
            http_response_code(400);
            exit();
        }

        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'userName' => isset($_PUT['userName']) ? $_PUT['userName'] : null,
            'userComments' => isset($_PUT['userComments']) ? $_PUT['userComments'] : null,
        ];
        $userData = $this->validateUser($inputData);

        $user = new User();
        $user->updateUser(['id' => $userID] + $userData); // ✅ Fixed variable

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function deleteUser($userID) {
        if (!$userID) {
            http_response_code(400);
            exit();
        }

        $user = new User();
        $user->deleteUser(['id' => $userID]); // ✅ Fixed key

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }
}

