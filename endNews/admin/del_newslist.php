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
        echo '成功删除了'.count($res).'条记录';
        $sql = "update t_news set delId = 0 where newId = ".$_GET['newId'];
        $ss = $pdo->prepare($sql)->execute();
    }
    else{
        echo '删除失败！';
    }
    $pdo = null;