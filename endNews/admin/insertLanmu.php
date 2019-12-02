<?php
    require "pdoConnect.php";

    $lanmuName = $_POST['lanmuName'];
    $sql = "insert into t_lanmu (lanmuName) values ('$lanmuName')";

    $sth = $pdo -> exec($sql);

    if($sth)
    {
        echo "成功添加栏目！";
    }
    else{
        echo "栏目添加失败！";
    }