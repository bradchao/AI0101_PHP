<?php
    $img = imagecreatefromjpeg("coffee.jpg");

    $yellow = imagecolorallocate($img,255,255,0);
    imagettftext($img, 36, 45, 100, 200,$yellow,
    'C:\xampp2\htdocs\brad\AI0101_PHP\myfont.ttf', "您");
    imagettftext($img, 30, -30, 120, 200,$yellow,
    'C:\xampp2\htdocs\brad\AI0101_PHP\myfont.ttf', "好");

    // 3. Output => 1. file; 2. Browser
    // header('Content-Type: image/jpeg');
    // imagejpeg($img);

    imagejpeg($img, "newcoffee.jpg");

    // 4. release
    imagedestroy($img);
?>