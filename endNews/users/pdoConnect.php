<?php


    echo "<link rel=\"stylesheet\" href=\"../admin/css/bootstrap.min.css\">";
    echo "<script src=\"../admin/js/jquery.js\"></script>";
    echo "<script src=\"../admin/js/bootstrap.min.js\"></script>";


    header("Content-Type: text/html; charset=utf-8");

    require "config.php";
    try{
        //连接数据库、选择数据库
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD);
    }catch(PDOException $e){
        //输出异常信息
        echo $e->getMessage();
    }
