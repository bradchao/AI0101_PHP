<?php
    $poker = array();
    for ($i=0; $i<52; $i++){
        do {

        }while(boolean);

        $temp = rand(0,51);
        
        // check
        $isRepeat = false;
        for ($j=0; $j<$i; $j++){
            if ($poker[$j] == $temp){
                $isRepeat = true;
                break;
            }
        }

        if (!$isRepeat){
            $poker[] = $temp;
            echo $temp . '<br>';
        }else{
            $i--;
        }
    }

?>