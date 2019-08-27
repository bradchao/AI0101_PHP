<?php
    $mysqli = new mysqli('localhost','root','','class');
    $mysqli->set_charset('utf8');

    $cId = 20;
    $sql = "DELETE FROM bk1 WHERE cId = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $cId);
    $stmt->execute();

    echo $stmt->affected_rows;


?>