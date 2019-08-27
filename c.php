<?php
    // 1. Model
    include 'bradapis.php';

    // 2. call  View
    function loadView($viewFile, $data){
        $query = http_build_query(array('data' => $data));
        echo file_get_contents(
            "http://localhost/brad/AI0101_php/views/{$viewFile}.php?{$query}");
    }

    $data = processData();
    loadView('view2', $data);

?>