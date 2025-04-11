<?php

namespace controllers;

use models\Henna;

class HennaController
{
    public function validateHenna($inputData) {
        $errors = [];
        $item = $inputData['item'];
        $price = $inputData['price'];

        if ($item) {
            $item = htmlspecialchars($item, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($item) < 2) {
                $errors['titleShort'] = 'item name is too short';
            }
        } else {
            $errors['requireditem'] = 'item is required';
        }

        if ($price) {
            $price = htmlspecialchars($price, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($price) < 1) {
                $errors['priceShort'] = 'price is too small';
            }
        } else {
            $errors['requiredprice'] = 'price is required';
        }
      
        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'item' => $item,
            'price' => $price,
        ];
    }

    public function getAllHenna() {
        $hennaModel = new Henna();
        header("Content-Type: application/json");
        $henna = $hennaModel->getAllHenna();

        echo json_encode($henna);
        exit();
    }

    public function getHennaByID($id) {
        $hennaModel = new Henna();
        header("Content-Type: application/json");
        $henna = $hennaModel->getHennaById($id);
        echo json_encode($henna);
        exit();
    }

    public function saveHenna() {
        $inputData = [
            'item' => $_POST['item'] ? $_POST['item']: false,
            'price' => $_POST['price'] ? $_POST['price']: false,
        ];
        $hennaData = $this->validateHenna($inputData);

        $henna = new Henna();
        $henna->saveHenna(
            [
                'item' => $hennaData['item'],
                'price' => $hennaData['price'],
            ]
        );

        http_response_code(200);
        $this->returnJSON([
            'route' => '/api/henna'
        ]);
        
        exit();
    }

    public function updateHenna($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        //no built-in super global for PUT
        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'item' => $_PUT['item'] ?: null,
            'price' => $_PUT['price'] ?: null,
        ];
        $hennaData = $this->validateHenna($inputData);
        //we could save the data off to be saved here

        $henna = new Henna();
        $henna->updateHenna(
            [
                'id' => $id,
                'item' => $hennaData['item'],
                'price' => $hennaData['price'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deleteHenna($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $henna = new Henna();
        $henna->deleteHenna(
            [
                'id' => $id,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function hennaView() {
        include './public/views/henna/henna-view.html';
        exit();
    }

    public function hennaAddView() {
        include './public/views/henna/henna-add.html';
        exit();
    }

    public function hennaDeleteView() {
        include './public/views/henna/henna-delete.html';
        exit();
    }

    public function bakeryUpdateView() {
        include './public/views/henna/henna-update.html';
        exit();
    }
    
