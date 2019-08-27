<?php
    $mysqli = new mysqli('localhost','root','','class');
    $mysqli->set_charset('utf8');

    $cId = 20;
    $cBirthday = '1991-02-09';
    // Update bk1 SET cBirthday = '1991-02-09' WHERE cID = 20
    $sql = "UPDATE bk1 SET cBirthday = ? WHERE cId = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('si', $cBirthday, $cId);
    $stmt->execute();

    echo $stmt->affected_rows;


?>