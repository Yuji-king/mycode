<?php
    require "pdoConnect.php";

    $username = "admin";
    $password = md5(trim($_POST['mpass']));
    $newpass = md5(trim($_POST['newpass']));

    $sql = "update t_user set userPwd = '$newpass' where userName='admin' and userPwd = '$password'";

    $sth = $pdo ->exec($sql);

    if($sth)
    {
        echo "成功修改管理员密码！";
    }
    else{
        echo "修改失败！";
    }