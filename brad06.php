<script>
    function cal(){
        let x = document.getElementById('x').value;
        let y = document.getElementById('y').value;
        let result = parseInt(x) + parseInt(y);
        document.getElementById('here').innerHTML = result;
    }
</script>
<form action="brad07.php">
    <input id="x" name="x">
    +
    <input id="y" name="y">
    <input type="submit" value="=">
    <input type="button" onclick="cal()" value="=">
    <span id='here'></span>
</form>