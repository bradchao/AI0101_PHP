<?php
    $poker = range(0,51);   // for ($i=0; $i<52; $i++) $poker[$i]=$i;
    shuffle ($poker);

    $players = [[],[],[],[]];
    foreach($poker as $i => $card){
        $players[$i%4][(int)($i/4)] = $card;
    }


?>