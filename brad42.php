<?php
if (!isset($_GET['filename'])) die('get out here');

$filename = $_GET['filename'];
$content = $_GET['content'];

$fp = fopen("dir1/{$filename}", 'w');
fwrite($fp, $content);
fclose($fp);

header("Location: dir1/{$filename}");

?>