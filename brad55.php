<?php
    include 'bradapis.php';
    session_start();

    $s1 = $_SESSION['s1'];
    echo $s1->sum() . ":" . $s1->avg() . '<br>'; 

?>