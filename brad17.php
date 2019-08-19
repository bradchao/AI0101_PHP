<?php
$ary1 = array(1,2,3,4,5);
$ary2[7] = 123;
$var3=123;
var_dump($ary2); 
echo '<br>';

echo count($ary2) . '<hr>';

foreach($ary2 as $k => $v){
    echo "{$k} : {$v}<br>";
}


?>
