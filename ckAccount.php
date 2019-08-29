<?php
    include_once 'sql.php';
    session_start();

    if (!isset($_REQUEST['account'])) header('Location: login.php');
    $account = $_REQUEST['account'];
    $passwd = $_REQUEST['passwd'];

    $sql = "SELECT * FROM member WHERE account = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $account);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0){
        // next step, check password
        $member = $result->fetch_object();  // member object
        if (password_verify($passwd, $member->passwd)){
            // check OK
            $_SESSION['member'] = $member;
            header('Location: main.php');
        } else{
            // check xx
            header('Location: login.php?errorMesg=xxx0');
        }

    }else{
        // not exist account
        header('Location: login.php?errorMesg=xxx1');
    }





?>