<?php
    require "pdoConnect.php";

    session_start();

    $username = $_POST['username'];
    $password = md5(trim($_POST['mpass']));
    $newpass = md5(trim($_POST['newpass']));
    $lanmuId = $_SESSION['lanmuId'];
    $userId = $_SESSION['id'];

    $sql = "select * from t_user where userId = '$userId'";
    $sql1 = "update t_user set userPwd = '$newpass' , userName = '$username'  where userId = '$userId' and userPwd = '$password'";

    $sth = $pdo -> prepare($sql);
    $sth -> execute();
    $res = $sth ->fetchAll();
//    var_dump($res);
    //echo $sql."</br>".$sql1."</br>".$sql2."</br>";
    if(count($res))
    {
        $ss = $pdo -> exec($sql1);
        var_dump($ss);
        if($ss)
        {
            echo "成功修改".$ss."条数据";
        }
        else
        {
            echo "修改失败！";
        }
    }
    else
    {
        echo "失败！";
    }
    $pdo = null;
