<?php
    header("Content-type:text/html;charset=utf-8");
    require "config.php";                       //引入配置文件
    $lanmuId = $_POST['chooseLanmu'];
    if(isset($_POST['username'])&&isset($_POST['password']))
    {
        $username = trim($_POST['username']);       //trim函数去除前后空格
        $password = md5(trim($_POST['password']));  //trim函数去除前后空格，使用md5加密

    }
    try{
        //连接数据库、选择数据库
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD);

        $query = "insert into t_user(userName,userPwd,lanmuId) values ('$username','$password','$lanmuId')";
        $res=$pdo->prepare($query);
        $sth=$res->execute();
        echo "<script>alert('恭喜您，注册成功！');window.location.href='index.html'; </script>";

    }
    catch(PDOException $e){
        //输出异常信息
        echo $e->getMessage();
    }
    $pdo=null;
?>