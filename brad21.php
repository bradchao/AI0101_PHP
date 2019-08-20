<?php
    $a[0] = 123;
    $a[1][0] = 10;
    $a[1][1] = 'Brad';
    $a[1][2][3] = 123;
    $a[2] = array(1,2,3,4,5);

    //echo count($a[2]) . '<hr>';

    foreach($a as $k => $v){
        if (gettype($v) == 'array'){
            foreach($v as $vv){
                if (gettype($vv) == 'array'){
                    foreach($vv as $vvv){
                        echo $vvv;
                    }
                }else{
                    echo $vv;
                }
                echo '<br>';
            }
        }else{
            echo $v;
        }
        echo '<br>';
    }

?>