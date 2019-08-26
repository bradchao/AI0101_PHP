<?php
    $fp = fopen('dir1/brad.txt', 'a+');
    fwrite($fp, "Kevin\nline1\nline2\n");
    fwrite($fp, "Kevin\n");
    fwrite($fp, "Kevin\n");
    fwrite($fp, "Kevin\n");
    fclose($fp);


?>