<?php
    $passwd = "123456";
    $passwd1 = password_hash($passwd, PASSWORD_DEFAULT);
    echo $passwd1;
    echo '<hr>';
    if (password_verify('', $passwd1)){
        echo 'OK';
    }else{
        echo 'XX';
    }
?>