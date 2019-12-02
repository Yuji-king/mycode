<?php

    require "pdoConnect.php";

    $lanmuId = $_GET['lanmuId'];
    $lanmuName = $_POST['lanmuName'];


    $sql = "update t_lanmu set lanmuName = '$lanmuName' where lanmuId = '$lanmuId'";
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