<?php
    $mystr = 'xabcdefg';
    $findme = 'x';
    if (strpos($mystr, $findme) !== false){
        echo 'i got it:' . strpos($mystr, $findme);
    }else{
        echo 'no';
    }


?>