<?php

    require "pdoConnect.php";
    session_start();
    $lanmuId = $_SESSION['lanmuId'];
    $sql = "select * from t_news where lanmuId = $lanmuId and delId = 1";
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
            echo '<td><div class="button-group"><a class="button border-red" href="del_newslist.php?newId='.$str.'"><span class="icon-trash-o"></span>删除</a><a class="button border-main" href="setNews.php?newId='.$str.'"><span class="icon-edit"></span>修改</a></div></td>';
        }
        echo "</table>";

    }

    else {
        echo '没有你想要的东西';
    }
    $pdo=null;






