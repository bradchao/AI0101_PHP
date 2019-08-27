<?php
    session_start();

    $rand = [1,2,3,4,5];
    foreach($rand as $k => $v){
        echo "{$k} : {$v}<br>";
    }
    $_SESSION['rand'] = $rand;

    $rand[3] = 87;

?>
<hr>
<a href='brad55.php'>Next Page</a>