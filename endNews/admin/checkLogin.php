<?php
header("Content-type:text/html;charset=utf-8");

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
    $sql = 'select * from t_user where userName = :username and userPwd = :password';
    $res = $pdo->prepare($sql);
    $res->bindParam(':username',$username);//绑定参数
    $res->bindParam(':password',$password);//绑定参数
    if($res->execute()){
        $rows = $res->fetch(PDO::FETCH_ASSOC);  //返回一个索引为结果集列名的数组
        if($rows){
            echo "<script>alert('恭喜您，登录成功！');window.location.href='../show/show.html'; </script>";
        }else{
            echo "<script>alert('用户名或密码错误，登录失败！');history.back();</script>";
            exit ();
        }
    }
}else{  //如果不是POST提交，跳转到登录页
    echo "<script>window.location.href='../show/index.html'</script>";
}
    $pdo=null;

?>