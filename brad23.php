<?php
    $poker = range(0,51);
    for ($i = 51; $i>0; $i--){
        $tempIndex = rand(0,$i);
        // $poker[$tempIndex] <=> $poker[$i]
        // [poker[$tempIndex],$poker[$i]] = [$poker[$i],poker[$tempIndex]]
        // [a,b] = [b,a];
    }


?>