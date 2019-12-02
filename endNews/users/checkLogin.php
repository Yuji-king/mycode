<?php
    header("Content-type:text/html;charset=utf-8");
    session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = trim($_POST['username']);       //trim函数去除前后空格
        $password = md5(trim($_POST['password']));  //trim函数去除前后空格，使用md5加密
        require "config.php";                       //引入配置文件
        try{
            //连接数据库、选择数据库
            $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD);
        }catch(PDOException $e){
            //输出异常信息
            echo $e->getMessage();
        }
        //user表中查找输入的用户名和密码是否匹配
        $sql = "select * from t_user where userName = '$username' and userPwd = '$password'";
        $res = $pdo->prepare($sql);
        $res ->execute();
        $sth = $res -> fetchAll();
        if(count($sth)){
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            foreach ($sth as $row)
            {
                if($row['userDelId']==1){
                    echo "<script>alert('恭喜您，登录成功！');window.location.href='manager.php'; </script>";
                    $_SESSION['id'] = $row['userId'];
                    $_SESSION['lanmuId'] = $row['lanmuId'];
                }else{
                    echo "<script>alert('用户名或密码错误，登录失败！');history.back();</script>";
                    exit ();
                }
            }

        }
        else{
            echo "<script>alert('用户名或密码错误，登录失败！');history.back();</script>";
        }
    }else{  //如果不是POST提交，跳转到登录页
        echo "<script>window.location.href='index.html'</script>";
    }
        $pdo=null;
?>