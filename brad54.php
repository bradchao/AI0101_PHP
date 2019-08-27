<?php
    include 'bradapis.php';
    session_start();

    $s1 = new Student(80,40,10);
    $_SESSION['s1'] = $s1;

    echo $s1->sum() . ":" . $s1->avg() . '<br>'; 
    
    $s1->math = 100;
    echo $s1->sum() . ":" . $s1->avg() . '<br>'; 


    
?>
<hr>
<a href='brad55.php'>Next Page</a>