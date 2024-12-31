<?php
include 'config.php';


// class Calc{

//     public function devide ($a,$b){
//         try{
//             return $a / $b;
//         }catch(Exception $e){
//             echo "Error:".$e -> getCode() ;
//     }
// }

// }
// $calc = new Calc();
// $calc -> devide(2, 0);



//set error handler 

function Error_Handler ($level, $message, $file, $line){
    $error = "level: $level <br>";
    $error .= "message: $message <br>";
    $error .= "file: $file <br>";
    $error .= "line: $line <br>";

    echo $error;
}

set_error_handler('Error_Handler');

echo $fkughdfk;
// To put the error in a file, and that file called logger
// file_put_contents('exceptions.log',$error, FILE_APPEND);









?>
