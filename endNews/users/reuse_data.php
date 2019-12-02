<?php
    require 'pdoConnect.php';

    //插入回收站
    $sql = "select * from t_news where newId=".$_GET['newId'];
    $sth = $pdo->prepare($sql);
    $sth -> execute();
    $res = $sth->fetchAll();
    if(count($res))
    {
        foreach ($res as $row)
        {
            echo '标题: '.$row['title']."</br>".' 内容: '.$row['userName']."</br>".' 日期: '.$row['addTime'].'</br>';
        }
        echo '恢复'.count($res).'条记录';
        $sql = "update t_news set delId = 1 where newId = ".$_GET['newId'];
        $ss = $pdo->prepare($sql)->execute();
    }
    else{
        echo '恢复失败！';
    }
    $pdo = null;