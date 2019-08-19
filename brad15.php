<?php
    $n = $sum = '';
    if (isset($_GET['n'])){
        $n = $_GET['n'];
        $sum =  $i = 0;

        // for ($i=1; $i<=$n; $i++){
        //     $sum += $i;
        // }

        //while ($i<=$n) $sum += $i++;
        
        for (;$i<=$n;) $sum += $i++;
        
    }
?>
<form action="brad15.php">
    1 + 2 + ... +
    <input type="number" name="n" value="<?php echo $n; ?>">
    <input type="submit" value="=">
    <?php echo $sum; ?>
</form>