<?php
    $fp = @fopen("dir1/Book1.csv",'r') or die();

    $i = 1;
    while (($line = fgets($fp)) !== false){
        $row = explode(",", $line);
        echo $row[2] . '<br>';
    }

    @fclose($fp);


?>