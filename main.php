<meta charset="utf-8" />
<?php
    session_start();
    if (!isset($_SESSION['member'])) header('Location: login.php');
    $member = $_SESSION['member'];
    //var_dump($member);

    //$icon = base64_encode($member->icon);
    $icon = base64_encode(file_get_contents("coffee.jpg"));

?>
<h1>CY Super Big Company</h1>
<hr>
Welcome, <?php echo $member->realname; ?><br>
<img src="data:image/jpeg;base64, <?php echo $icon; ?>" />

<hr>
<a href='logout.php'>Logout</a>