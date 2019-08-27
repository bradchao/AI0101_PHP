<?php
    $data['var1'] = 123;
    $data['var2'] = 345;
    $data['var3'] = 'Brad Chao';
    $query = http_build_query($data);
    echo $query;
?>