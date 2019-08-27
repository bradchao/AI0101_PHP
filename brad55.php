<?php
    session_start();
    $rand = $_SESSION['rand'];
    foreach($rand as $k => $v){
        echo "{$k} : {$v}<br>";
    }

?>