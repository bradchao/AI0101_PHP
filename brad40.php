<?php
    $fp = fopen('https://tw.stock.yahoo.com/q/bc?s=3008','r');
    $fpw = fopen('dir1/s3008.txt', 'w');

    while ( ($line = fgets($fp)) !== false){
        fwrite($fpw, $line);
    }

    fclose($fpw);
    fclose($fp);


?>