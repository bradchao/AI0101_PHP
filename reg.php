<?php
    include_once 'sql.php';

    if (isset($_POST['account'])){
        $account = $_POST['account'];
        $passwd = $_POST['passwd'];
        $realname = $_POST['realname'];

        $icon = null;
        if ($_FILES['icon']['error'] == 0){
            $icon = addslashes(file_get_contents($_FILES['icon']['tmp_name']));
        }

        $passwd1 = password_hash($passwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO member (account,passwd,realname,icon) VALUES " .
            "('{$account}','{$passwd1}','{$realname}','{$icon}')";
        
        if ($mysqli->query($sql)){
            // Success
        }else{
            // Failure
        }

    }

?>
<script>
    function isFormCheckOK(){
        // ......
        return true;
    }
</script>

<form method='post' enctype='multipart/form-data' 
    action='reg.php' onsubmit="return isFormCheckOK()">
    Account: <input type="text" name="account" /><br>
    Password: <input type="password" name="passwd" /><br>
    Realname: <input type="text" name="realname" /><br>
    Icon: <input type="file" name="icon" /><br>
    <input type="submit" value="Register" />
</form>