<?php
    if (!isset($_FILES['upload'])) 
        header('Location: brad45.php');
        
    $upload = $_FILES['upload'];
    foreach($upload as $k => $v){
        echo "{$k} => <br>";
        foreach($v as $kk => $vv){
            echo "{$kk} => {$vv}<br>";
        }
        echo "<hr>";
    }

    foreach($upload['error'] as $k => $v){
        if ($v == 0){
            // $k
            if (move_uploaded_file( 
                $upload['tmp_name'][$k],
                "upload/brad46_{$upload['name'][$k]}" 
                ) ){
                echo "{$k} : success<br>";
            }else{
                echo "{$k} : failure<br>";
            }
        }
    }

?>