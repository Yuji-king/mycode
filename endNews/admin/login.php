<?php

    header("Content-Type: text/html; charset=utf-8");
    require "config.php";                       //引入配置文件
    session_start();

    try{
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD);
        if(isset($_POST['username'])&&isset($_POST['password']))
        {
            $username = trim($_POST['username']);       //trim函数去除前后空格
            $password = md5(trim($_POST['password']));  //trim函数去除前后空格，使用md5加密
        }
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
    $sql = 'select * from t_user where userName = :username and userPwd = :password';
    $res=$pdo->prepare($sql);
    $res->bindParam(':username',$username);//绑定参数
    $res->bindParam(':password',$password);//绑定参数
    $res->execute();
    $sth=$res->fetchAll();
    $flag = 0;
    if (count($sth)>0) {
        foreach ($sth as $row)
        {
            if($row['userName']==='admin')
            {
                $flag = 1;
            }
            else{
                $flag = 0;
            }
        }
        if ($flag)
        {
            $_SESSION['uname'] = $_POST['username'];
            $_SESSION['pwd'] = $_POST['password'];
            $_SESSION['pwd2'] = '1123123';
            $_SESSION['id'] = '1';
            echo "<script>alert('欢迎您，管理员');
            window.location.href=\"index.php\"</script>";
        }
        else{
            echo "<script>alert('请输入正确的管理员账号！');window.location.href=\"login.html\";</script>";
        }

    }
    else {
        echo "<script>alert('账户或者密码错误！重新填写');
            window.location.href=\"login.html\";</script>";
    }
    echo session_id();