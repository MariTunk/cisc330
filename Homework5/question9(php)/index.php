<?php
//we need this to accept requests from any domain
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_Henna"], '?');

//get uri pieces
$hennaArray = explode("/", $henna);
//var_dump($uriArray);
//0
//1 forms

if ($hennaArray[1] === 'jagua' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $henna = [
        [
            'itemName' => 'jagua henna'
            'price' => '$45'
        ],
        [
           'itemName' => 'Red henna'
            'price' => '$25' 
        ]
    ];

    echo json_encode($henna);
    exit();
}

if ($hennaArray[1] === 'form' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo json_encode([
        'message' => 'Success'
    ]);
    exit();
}


?>
