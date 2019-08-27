<?php
    $mysqli = new mysqli('localhost','root','','class');
    $mysqli->set_charset('utf8');

    $cId = 20;
    $cName = 'Kevin';
    $cSex = 'M';
    $cBirthday = '1999-01-02';
    $sql = "INSERT INTO bk1 (cId,cName,cSex,cBirthday) VALUES " .
            "(?,?,?,?)";
    
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('isss', $cId,$cName,$cSex,$cBirthday);
    $stmt->execute();

    echo $stmt->affected_rows;


?>