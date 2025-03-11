<?php

namespace inClass16/phpproject;

use Exception;


function checkNum($number) {
    if($number>2) {
      throw new Exception("Value must be 2 or below");
    }
    return true;
  }
  
  try {
    checkNum(5);
    echo 'If you see this, the number is 1 or below';
  }
  
  catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }

