<?php
    require 'pdoConnect.php';

    $sql = "delete from t_news where delId = 0";
    $sth = $pdo->exec($sql);
    if($sth) {
        echo '成功删除了'.$sth.'条记录';
    }
    else {
        echo '删除失败';
    }
    $pdo=null;