<?php
    include_once 'sql.php';

    if (!isset($_GET['account'])) return;

    $account = $_GET['account'];
    $sql = "SELECT * FROM member WHERE account = '{$account}'";
    $result = $mysqli->query($sql); // return => mysqli_result object
    echo $result->num_rows;

?>