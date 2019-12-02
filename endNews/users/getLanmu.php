<?php


    require "pdoConnect.php";

    $sql = "select * from t_lanmu where lanmudel = 1";
    //执行查询，返回结果集对象
    $res = $pdo->prepare($sql);
    $res -> execute();
    $sth = $res -> fetchAll();
    $str = "";

    //如果结果集存在并且有数据
    if (count($sth)) {
        echo "<table class=\"table text-center table-striped\"> <tr>
          <th width=\"5%\">栏目编号</th>
          <th width=\"15%\">栏目名称</th>
          <th width=\"10%\">操作</th>
        </tr>";
        foreach ($sth as $row){
            $str = $row['lanmuId'];
            echo '<tr>';
            echo '<td>'.$row['lanmuId'].'</td><td>'.$row['lanmuName'].'</td>';
            echo '<td><div class="button-group"><a class="button border-red" href="delLanmu.php?lanmuId='.$str.'"><span class="icon-trash-o"></span>删除</a><a class="button border-main" href="editLanmu.php?lanmuId='.$str.'"><span class="icon-edit"></span>修改</a></div></td>';
        }
        echo "</table>";

    } else {
        echo '么有你想要的东西';
    }
    $pdo = null;






