<?php
    $x = $y = $result = '';
    if (isset($_GET['x'])){
        $x = $_GET['x']; $y  = $_GET['y'];
        $r1 = (int)($x / $y);
        $r2 = $x % $y;
        $result = "{$r1} ...... {$r2}";
    }
?>
<form method="get">
    <input name="x" value="<?= $x ?>">
    /
    <input name="y" value="<?= $y ?>">
    <input type="submit" value="=">
    <?= $result ?>
</form>