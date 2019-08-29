<?php
    $mesg = isset($_GET['errorMesg'])?$_GET['errorMesg']:'';
    echo $mesg;
?>
<form action="ckAccount.php" method='get'>
    Account: <input type="text" name="account" /><br>
    Password: <input type="password" name="passwd" /><br>
    <input type="submit" value="Login" />
    <button type="button" onclick="location.href='reg.php'">
    Register
    </button>
</form>