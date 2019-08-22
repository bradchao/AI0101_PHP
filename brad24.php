<?php
    $a = 100; $b = -30;
    echo "a = {$a}, b = {$b}<br>";
    $a = $a ^ $b;   // a = 13, b = 3
    $b = $a ^ $b;   // a = 13, b = 10
    $a = $a ^ $b;   // 
    echo "a = {$a}, b = {$b}";
?>