<?php
    require 'pdoConnect.php';

    $sql = "select * from t_lanmu where lanmuId=".$_GET['lanmuId'];
    $res = $pdo->prepare($sql);
    $res -> execute();
    $sth = $res -> fetchAll();
    if(count($sth)) {
        echo '成功删除了'.count($sth).'条记录';
        $sql = "update t_lanmu set lanmuDel = 0 where lanmuId=".$_GET['lanmuId'];
        $pdo->prepare($sql)->execute();
    }
    else {
        echo '删除失败!';
    }
    $pdo = null;