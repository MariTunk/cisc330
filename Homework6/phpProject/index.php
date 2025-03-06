
<?php

$myArray= [
    'guests'=> '1',
    'name'=> 'Mariyam',
    'age'=> '34',
    'Country'=> 'Maldives'
    ];


    function echoArrayAsString(array $array= ['guests' =>'1','name'=> 'Mariyam', 'age'=> '34','Country'=> 'Maldives']): void
    {
        foreach($array as $key => $value){
            echo "{$key}:{$value}}";
            echo '<br>';
        }
    }
    echoArrayAsString(array: $myArray);
    //echoArrayAsString();

?>
