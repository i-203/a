<?php
function Square($n){
    if($n<0){
        return"Invalid input:Square root of negative number";
    }
    $Square=sqrt($n);
    return $Square;
}
$n=25;
echo"The Square root of $n is:".Square($n);
?>