<?php


    require "pdoConnect.php";


    $sql = "select * from t_news where delId = 0 order by addTime desc";
    //执行查询，返回结果集对象
    $res = $pdo->prepare($sql);
    $res -> execute();
    $sth = $res -> fetchAll();
    $str = "";

    if(count($sth))
    {
        echo "<table class=\"table text-center table-striped\"> <tr>
          <th width=\"5%\">新闻编号</th>
          <th width=\"15%\">新闻名称</th>
          <th width=\"10%\">创建时间</th>
          <th width=\"10%\">操作</th>
        </tr>";
        foreach ($sth as $row){
            $str = $row['newId'];
            echo '<tr>';
            echo '<td>'.$row['newId'].'</td><td>'.$row['title'].'</td><td>'.$row['addTime'].'</td>';
            echo '<td><div class="button-group"><a class="button border-red" href="reuse_data.php?newId='.$str.'"><span class="icon-paper-plane"></span>恢复</a></div></td>';
        }
        echo "</table>";

    }

    else {
        echo '回收站空！';
    }
    $pdo=null;


