<?php
    $data = $_GET['data'];
    foreach($data as $key => $value){
        $$key = $value;
    }
?>

<h2 style='color: #00f; background-color: #ff0'><?php echo $title; ?></h2>
<hr>
Welcome come back, <?php echo $user; ?>