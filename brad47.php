<?php
    $rate = $_GET['rate']; // 50%
    $width = 400;
    // 1. Canvas
    $img = ImageCreate($width, 24);

    // 2. Drawing...
    $yellow = ImageColorAllocate($img, 0,255,255);
    $red = ImageColorAllocate($img, 255,0,0);
    imagefill ($img , 0 , 0 , $yellow );
    imagefilledrectangle ($img , 0 , 0 , $width*$rate/100 , 24 , $red ) ;

    // 3. Output => 1. file; 2. Browser
    header('Content-Type: image/jpeg');
    imagejpeg($img);

    // 4. release
    imagedestroy($img);

?>