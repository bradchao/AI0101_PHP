<?php
    $result = $x = $y = '';
    if (isset($_GET['x'])) {
        $x = $_GET['x']; $y = $_GET['y'];
        $result = $x + $y;
        //echo "{$x} + {$y} = {$result}";
    } 
?>
<script>
    function cal(){
        let x = document.getElementById('x').value;
        let y = document.getElementById('y').value;
        let result = parseInt(x) + parseInt(y);
        document.getElementById('here').innerHTML = result;
    }
</script>
<form action="brad06.php">
    <input id="x" name="x" value="<?= $x ?>">
    +
    <input id="y" name="y" value="<?php echo $y; ?>">
    <input type="submit" value="=">
    <input type="button" onclick="cal()" value="=">
    <span id='here'><?php echo $result; ?></span>
</form>