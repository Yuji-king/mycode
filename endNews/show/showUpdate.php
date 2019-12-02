<?php
    require "../admin/config.php";
    header("Content-type:text/html;charset=utf-8");
    try{
        $pdo=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        echo "连接成功!";
    }catch (PDOException $e){
        echo $e->getMessage();
    }
    $sql="select * from t_news where delId = 1 order by addTime desc";
    $res=$pdo->prepare($sql);
    $res->execute();
    $sth=$res->fetchAll();
    $pdo=null;
    echo json_encode($sth);
