<?php
$p = array(1=>0,0,0,0,0,0);    // $p[1] = 0; ~ $p[6] = 0
for ($i=0; $i<100; $i++){
    $p[rand(1,6)]++;
}
foreach($p as $point => $count){
    echo "{$point}點出現{$count}次<br>";
}

?>