<?php
    $mysqli = new mysqli('localhost','root','','class');
    $mysqli->set_charset('utf8');

    $sql = 
    "SELECT cID,cName,cBirthday,cSex FROM bk1 ORDER BY cBirthday LIMIT 4";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $stmt->store_result();
    echo $stmt->num_rows . '<br>';

    $stmt->bind_result($cID,$cName,$cBirthday,$cSex);

    while ($stmt->fetch()){
        echo "{$cID} : {$cName} : {$cBirthday} <br>";
    }

    $stmt->free_result();
    $stmt->close();
?>