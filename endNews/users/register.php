<?php
    require "pdoConnect.php";

    $sql = "select lanmuId,lanmuName from t_lanmu";
    $sth = $pdo ->prepare($sql);
    $sth -> execute();
    $res = $sth -> fetchAll();

    $id = "";
    $lmName = "";

?>


<!DOCTYPE html>
<html lang="en" class="is-centered is-bold">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link href="../css/main.css" rel="stylesheet">
</head>
<body>
<section style="background: transparent">
    <form class="box py-3 px-4 px-2-mobile" role="form" method="post" action="checkInfo.php" autocomplete="on">
        <div class="is-flex is-column is-justified-to-center">
            <h1 class="title is-3 mb-a has-text-centered">
                注册
            </h1>
            <div class="inputs-wrap py-3">
                <div class="control">
                    <input type="text" id="username" name="username" class="input" placeholder="用户名不得超过16位" value="" required onkeyup="chkNameLen()">
                    <div id="chk-1" style="width: 50px; height: 20px; position: absolute; left: 280px; top: 15px; font-size: x-small;"></div>
                </div>
                <div class="control">
                    <input type="password" id="password" name="password" class="input" placeholder="密码不得超过16位" required onkeyup="chkPwdLen()">
                    <div id="chk-2" style="width: 45px; height: 20px; position: absolute; left: 280px; top: 15px; font-size: x-small;"></div>
                </div>
                <div class="control">
                    <input type="password" id="passwordAgain" name="passwordAgain" class="input" placeholder="确认密码" required onkeyup="checkIsAga()">
                    <div id="chk-3" style="width: 45px; height: 20px; position: absolute; left: 280px; top: 15px; font-size: x-small;"></div>
                </div>
                <div class="control" style="text-align: center">
                    <select name="chooseLanmu">
                    <?php
                        foreach ($res as $row)
                        {
                            $id = $row['lanmuId'];
                            $lmName = $row['lanmuName'];
                            echo '<option  value="'.$id.'">'.$lmName.'</option>';
                        }
                        $pdo = null;
                    ?>
                    </select>
                </div>
                <div class="control">
                    <button type="submit" class="button is-submit is-primary is-outlined">
                        注册
                    </button>
                </div>
            </div>
        </div>
    </form>
</section>
</body>
<script>
    function chkNameLen() {
        var username = document.getElementById("username");
        var chk_1 = document.getElementById("chk-1");
        if(username.value.length>16)
        {
            chk_1.innerText="用户名过长";
            chk_1.style.color="red";
        }
        else if(username.value.length>0){
            chk_1.innerText="用户名合法";
            chk_1.style.color="green";
        }
        else{
            chk_1.innerText="";
        }
    }
    function chkPwdLen() {
        var password = document.getElementById("password");
        var chk_2 = document.getElementById("chk-2");
        if(password.value.length>16)
        {
            chk_2.innerText="密码过长";
            chk_2.style.color="red";
        }
        else if(password.value.length>0){
            chk_2.innerText="密码合法";
            chk_2.style.color="green";
        }
        else {
            chk_2.innerText="";
        }
    }
    function checkIsAga() {
        var password = document.getElementById("password");
        var passwordAgain = document.getElementById("passwordAgain");
        var chk_3=document.getElementById("chk-3");
        if(password.value!==passwordAgain.value)
        {
            chk_3.style.color="red";
            chk_3.innerText="密码不同";
        }
        else if(password.value===passwordAgain.value&&passwordAgain.value!==""){
            chk_3.style.color="green";
            chk_3.innerText="密码相同";
        }
        else {
            chk_3.innerText="";
        }
    }

</script>
</html>

