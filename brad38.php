<?php
    $content = file("dir1/Book1.csv");  // read to array => $content
    foreach($content as $i => $line){
        echo "{$i}:{$line}<br>";
    }
?>