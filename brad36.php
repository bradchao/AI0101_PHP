<?php
date_default_timezone_set('Asia/Taipei');
?>
<table border="1" width="100%">
    <tr>
        <th>Dir or File</th>
        <th>Filename</th>
        <th>Filesize</th>
        <th>Modify Time</th>
    </tr>
<?php
    $dir = "c:/brad";
    $fp = @opendir($dir) or exit('Server Busy!');  // /opt/dir1
    while ($filename = readdir($fp)){
        echo '<tr>';
        if (is_dir("{$dir}/{$filename}")){
            echo '<td>[Dir]</td>';
        }else{
            echo '<td>[File]</td>';
        }
        echo "<td>{$filename}</td>";

        $size = filesize("{$dir}/{$filename}");
        echo "<td align='right'>{$size}bytes</td>";

        $mtime = date('Y-m-d H:i:s',filemtime("{$dir}/{$filename}"));
        echo "<td>{$mtime}</td>";

        echo '</tr>';
    }
    closedir($fp);

    unlink('c:\brad\class.sql');

?>
</table>