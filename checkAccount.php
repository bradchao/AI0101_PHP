<?php
    include_once 'sql.php';

    if (!isset($_POST['account'])) return;

    $account = $_POST['account'];
    $sql = "SELECT * FROM member WHERE account = '{$account}'";
    $result = $mysqli->query($sql); // return => mysqli_result object
    echo $result->num_rows;

?>