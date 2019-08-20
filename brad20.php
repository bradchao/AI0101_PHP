<?php
$p = array(1=>0,0,0,0,0,0);    // $p[1] = 0; ~ $p[6] = 0
for ($i=0; $i<100000; $i++){
    $point = rand(1,9);
    $p[$point>6?$point-3:$point]++;
}
foreach($p as $point => $count){
    echo "{$point}點出現{$count}次<br>";
}

?>