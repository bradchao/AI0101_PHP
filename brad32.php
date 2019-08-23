<?php
    $str = 'B1234567899999999';
    $regex = '/^[A-Z][12][0-9]{8}$/';
    if (preg_match($regex, $str)){
        echo 'OK';
    }else{
        echo 'XX';
    }

?>