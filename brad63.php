<?php
    $n = isset($_GET['n']) ? $_GET['n'] : 49;
    echo rand(1,$n);
?>