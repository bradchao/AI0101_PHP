<?php
    include 'bradapis.php';

    $id = createTWIdByRandom();
    echo $id . '<br>';
    $id = createTWIdByGender(true);
    echo $id . '<br>';
    $id = createTWIdByArea('A');
    echo $id . '<br>';
    $id = createTWIdByBoth(true, 'Y');
    echo $id . '<br>';

?>