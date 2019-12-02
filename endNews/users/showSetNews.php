<?php

    require "pdoConnect.php";

    session_start();

    $newId = $_GET['newId'];
    $title = $_POST['title'];
    $contents = $_POST['contents'];
    $lanmuId = $_SESSION['lanmuId'];

    $sql = "select lanmuName from t_lanmu where lanmuId='$lanmuId'";
    $res = $pdo->prepare($sql);
    $res->execute();
    $sth = $res->fetchAll();
    $str = "";

    foreach ($sth as $row){
        $str = $row['lanmuName'];
    }

    $sql = "update t_news set title = '$title',lanmuName = '$str',contents = '$contents' where newId = '$newId'";
    $sth = $pdo->exec($sql);
    if($sth) {
        $res1 = '成功修改了'.$sth.'条记录';
        echo "<div class=\"container\">
        <div class=\"jumbotron\">
            <h2 style='color: #30ff09;'>{$res1}</h2>	
        </div>
    </div>";
    }
    else {
        echo '修改失败';
    }
    //关闭连接
    $pdo = null;

?>