<?php

namespace app\controllers;

use Exception;
use Error;

function myErrorHandler($errno, $errstr, $errfile, $errline) {
//    echo "<b>Custom error:</b> [$errno] $errstr<br>";
//    echo " Error on line $errline in $errfile<br>";
    echo 'my error handler called';
    exit();
}
class ErrorController {

    public function warningFunction() {
        preg_match('There will be a warning about missing delimiter here!', 'test');
    }

    public function errorFunction() {
        $price = 7;
        $quantity = 'five';
        $price * $quantity;
    }
    public function viewErrors() {
//        $this->badFunction();
//        $this->warningFunction();
        try {
//        echo 'Find an error";
//            $this->badFunction();
//            if (true) {
//                throw new Exception('Custom error message!');
//            }
        } catch (Error $error) {
            echo $error;
        }

        //set a custom function for errors
        set_error_handler("app\controllers\myErrorHandler");
        trigger_error('');

    }
}
