<?php
    function test1(){
        global $v;
        $v += 7;
    }

    $v = 100;
    test1();
    test1();
    test1();
    test1();
    echo $v;
?>