<?php
    $account = $_GET['account'];
    $zipcode = $_GET['zipcode'];
    $gender = $_GET['gender'];
    $habit = isset($_GET['habit'])?$_GET['habit']:[];
    foreach($habit as $k => $v){
        echo "{$k} => {$v}<br>";
    }
    $memo = $_GET['memo'];
    $range = $_GET['range'];
    $key = $_GET['key'];
    echo $key;
?>