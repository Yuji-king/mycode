<?php


    require "pdoConnect.php";

    $sql = "select * from t_user natural join t_lanmu where userDelId=1 and userName!='admin'";
    //执行查询，返回结果集对象
    $res = $pdo->prepare($sql);
    $res -> execute();
    $sth = $res -> fetchAll();
    $str = "";

    //如果结果集存在并且有数据
    if (count($sth)) {
        echo "<table class=\"table text-center table-striped\"> <tr>
          <th width=\"5%\">用户编号</th>
          <th width=\"15%\">用户名称</th>
          <th width=\"10%\">管理栏目</th>
          <th width=\"10%\">操作</th>
        </tr>";
        foreach ($sth as $row){
            $str = $row['userId'];
            echo '<tr>';
            echo '<td>'.$row['userId'].'</td><td>'.$row['userName'].'</td><td>'.$row['lanmuName'].'</td>';
            echo '<td><div class="button-group"><a class="button border-red" href="del_user.php?userId='.$str.'"><span class="icon-trash-o"></span>删除</a></div></td>';
        }
        echo "</table>";

    } else {
        echo '么有你想要的东西';
    }
    $pdo = null;






