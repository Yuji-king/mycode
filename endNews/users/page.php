<?php

    require "pdoConnect.php";
    session_start();

    $title = $_POST['title'];
    $contents = $_POST['contents'];
    $lanmuId = $_SESSION['lanmuId'];
    $auther = $_SESSION['username'];
    $userId = $_SESSION['id'];

    $sql = "select lanmuName from t_lanmu where lanmuId='$lanmuId'";
    $res = $pdo->prepare($sql);
    $res->execute();
    $sth = $res->fetchAll();
    $str = "";
    foreach ($sth as $row){
        $str = $row['lanmuName'];
    }

    $sql = "insert into t_news(title,contents,userId,addTime,hitCounts,lanmuId,lanmuName,userName)values ('$title',
    '$contents','$userId',NOW(),'0','$lanmuId','$str','$auther')";
    $sth = $pdo->exec($sql);
    if($sth) {
        $res1 = '成功添加了'.$sth.'条记录';
        echo "<div class=\"container\">
        <div class=\"jumbotron\">
            <h2 style='color: #30ff09;'>{$res1}</h2>	
        </div>
    </div>";
    }
    else {
        echo '添加失败';
    }
    //关闭连接
    $pdo = null;