<?php
    $poker = range(0,51);   // for ($i=0; $i<52; $i++) $poker[$i]=$i;
    shuffle ($poker);

    $players = [[],[],[],[]];
    foreach($poker as $i => $card){
        $players[$i%4][(int)($i/4)] = $card;
    }
?>
<table border="1" width="100%">
    <?php
        $suits = ["&spades;",
            "<font color='red'>&hearts;</font>",
            "<font color='red'>&diams;</font>",
            "&clubs;"];
        $values = ['A',2,3,4,5,6,7,8,9,10,'J','Q','K'];
        foreach($players as $player){
            sort($player);
            echo '<tr>';
            foreach($player as $card){
                echo '<td>';
                echo $suits[(int)($card/13)];
                echo $values[$card%13];
                echo '</td>';
            }
            echo '</tr>';
        }
    ?>
</table>