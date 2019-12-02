<?php
    require 'pdoConnect.php';

    $sql = "select * from t_user where userId=".$_GET['userId'];
    $res = $pdo->prepare($sql);
    $res -> execute();
    $sth = $res -> fetchAll();
    echo $_GET['userId'];
    if(count($sth)) {
        echo '成功删除了'.count($sth).'条记录';
        $sql = "update t_user set userDelId = 0 where userId=".$_GET['userId'];
        $pdo->prepare($sql)->execute();
    }
    else {
        echo '删除失败!';
    }
    $pdo = null;