<?php
    function checkTWId($id){
        if (strlen($id) == 10){
            $ch1 = substr($id,0,1);
            if ($ch1 >= 'A' && $ch1 <= 'Z'){
                echo 'OK';
            }
        }
        return true;
    }

    checkTWId('A123456789');

?>