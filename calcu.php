<?php

function calculator($num1 , $num2 ,$opr){
    $value = 0;
    switch($opr){
       case "add":
        $value = $num1 + $num2;
        break;
       case "sub":
        $value = $num1 - $num2;
        break;
       case "sub":
        $value = $num1 * $num2;
        break;
       case "div":
        $value = $num1 / $num2;
        break;
       case "rem":
        $value = $num1 % $num2;
        break;
       case "pow":
        $value  = pow($num1 , $num2);
        break;
       defaul:
       echo "Error";
    }
    return $value;
}

$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$opr = $_POST["opr"];

echo " value : " ,calculator($num1 , $num2 , $opr);



