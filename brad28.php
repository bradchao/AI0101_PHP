<?php
    function sayYa(){
        echo 'Ya<br>';
    }
    function sayHello($name){
        echo "Hello, {$name}<br>";
    }
    function sayHelloV2($n, $name){
        for ($i=0; $i<$n; $i++){
            echo "Hello, {$name}<br>";
        }
    }
    function sayHelloV3($n = 1, $name = 'World'){
        for ($i=0; $i<$n; $i++){
            echo "Hello, {$name}<br>";
        }
    }

    function sayHelloV4(){
        //echo func_num_args() . '<br>';
        $args = func_get_args();
        echo gettype($args) . count($args) . '<br>';
    }

    /*
    * dfhgdfth
    */
    sayYa();    // say Ya
    sayYa();
    sayHello('Brad');
    sayHelloV2(3,'Brad');
    echo '<hr>';
    sayHelloV3(2, 'Brad');
    sayHelloV3('Peter');
    echo '<hr>';
    sayHelloV4();
    sayHelloV4(1,2,3,4);
    sayHelloV4('Brad', 'III');
    sayHelloV4(true, 'OK',1,2,3,4);
    // // ....
    // hw => hw01.php, hw02.php
    // mysql => hw.sql 

?>