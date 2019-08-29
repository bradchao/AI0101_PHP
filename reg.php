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
        $sql = "INSERT INTO member (account,passwd,realname,icon) " .
            "VALUES ('{$account}','{$passwd1}','{$realname}','{$icon}')";
        
        if ($mysqli->query($sql)){
            // Success
            header('Location: login.php');
        }else{
            // Failure
            echo 'ERROR<>';
        }

    }

?>
<script>
    let xhttp = new XMLHttpRequest();
    let isAccountError = true; 
    function isFormCheckOK(){
        // ......
        return true;
    }
    function checkAccount(){
        let account = document.getElementById('account').value;
        xhttp.onreadystatechange = afterCheck;
        xhttp.open("GET", "checkAccount.php?account=" + account, true);
        xhttp.send();
    }
    function afterCheck(){
        let mesg = document.getElementById('mesg');
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            if (xhttp.responseText == '0'){
                isAccountError = false;
                mesg.innerHTML = 'OK';
            }else{
                mesg.innerHTML = 'XX';
            }
        }
    }

</script>

<form method='post' enctype='multipart/form-data' 
    action='reg.php' onsubmit="return isFormCheckOK()">
    Account: <input type="text" id='account' name="account"
     onchange="checkAccount()" /><span id='mesg'></span><br>
    Password: <input type="password" name="passwd" /><br>
    Realname: <input type="text" name="realname" /><br>
    Icon: <input type="file" name="icon" /><br>
    <input type="submit" value="Register" />
</form>