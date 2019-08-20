<table border="1" width="100%">
<?php
    define("ROW", 1);
    define("DPR", 9);   // tds per row
    define("START", 1); 

    for ($k=0; $k<ROW; $k++){
        echo '<tr>';
        for ($j=START; $j<START+DPR; $j++){
            $newj = $j + $k*DPR;

            if (($j+$k) % 2 == 0){
                echo '<td bgcolor="pink">';
            }else{
                echo '<td bgcolor="yellow">';
            }
            
            for ($i = 1; $i <= 9; $i++){
                $r = $newj * $i;
                echo "{$newj} x ${i} = ${r}<br>";
            }
            echo '</td>';
        }
        echo '</tr>';
    }
?>
