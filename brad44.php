<?php
    $upload = $_FILES['upload'];

    foreach($upload as $k => $v){
        echo "{$k} => {$v}<br>";
    }

    if ($upload['error'] == 0){
        
        if (move_uploaded_file($upload['tmp_name'], 
                "upload/{$upload['name']}")){
            echo 'Success';
        }else{
            echo 'Failure';
        }

        // if (copy($upload['tmp_name'], "upload/{$upload['name']}")){
        //     echo 'Success';
        // }else{
        //     echo 'Failure';
        // }
    }

?>