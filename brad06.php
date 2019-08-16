<?php
    $result = $x = $y = '';
    $op = 1;
    if (isset($_GET['x'])) {
        $x = $_GET['x']; $y = $_GET['y'];
        $op = $_GET['op'];
        if ($op == 1){
            $result = $x + $y;
        }else if ($op== 2){
            $result = $x - $y;
        }else if ($op== 3){
            $result = $x * $y;
        }else if ($op== 4){
            $r1 = (int)($x / $y);
            $r2 = $x % $y;
            $result = "{$r1} ......{$r2}";
        }
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
    <select name="op">
        <option value="1" <?php echo $op==1?'selected':'' ?>>+</option>
        <option value="2" <?php echo $op==2?'selected':'' ?>>-</option>
        <option value="3" <?php echo $op==3?'selected':'' ?>>x</option>
        <option value="4" <?php echo $op==4?'selected':'' ?>>/</option>
    </select>
    <input id="y" name="y" value="<?php echo $y; ?>">
    <input type="submit" value="=">
    <input type="button" onclick="cal()" value="=">
    <span id='here'><?php echo $result; ?></span>
</form>