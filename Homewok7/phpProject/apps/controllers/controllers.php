<?php

namespace controller;

//require "../controller/noteController.php";

use controllers\controller;

class Note
{
    public function getUsers() {
        $params = [
            //pincone
            'title' => $_GET['title'] ?? null,
            'description' => $_GET['description'] ?? null,
        ];
        $userModel = new Note();
        $users = $userModel->getAllUsersByName($params);
        echo json_encode($users);
        exit();
    }

    public function saveUser() {
        //get post data from our form post
        //{name: 'pinecone', age: '14'}
        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;
        $errors = [];

        //validate and sanitize name
        if ($title) {
            
            $title = htmlspecialchars($title);

            //echo ($title);
            //echo '<br>';
            //echo htmlspecialchars(htmlspecialchars($title));

            //validate text length
            if (strlen($title) < 4) {
                $errors['title'] = 'Title must be at least 4 characters long';
            }
        } else {
            $errors['title'] = 'Title is required';
        }

        if ($description) {
            $description = htmlspecialchars($description);

            //echo ($description);
            //echo '<br>';
            //echo htmlspecialchars(htmlspecialchars($description));

            //validate text length
            if (strlen($description) < 11) {
                $errors['description'] = 'Description must be at least 11 characters long';
            }
        } else {
            $errors['description'] = 'Description is required';
        }

       
        //if we have errors
        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        $returnData = [
            'title' => $title,
            'description' => $description,
            'message' => 'Request is successful!'
        ];
        echo json_encode($returnData);
        exit();
    }

    public function viewAddUsers() {
        require './view/messageVal.html';
        exit();
    }

}
