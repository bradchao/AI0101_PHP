<?php
    $a = 23;
    $isPrime = true;
    for ($j=2; $j<$a; $j++){
        if ($a % $j == 0){
            $isPrime = false;
            break;
        }
    }
    echo $isPrime?'Yes':'No';

?>