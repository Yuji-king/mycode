<?php
    require "../admin/config.php";
    header("Content-type:text/html;charset=utf-8");
    try{
        $pdo=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //        echo "连接成功!";
    }catch (PDOException $e){
        echo $e->getMessage();
    }
    $id = $_GET['id'];
    if($id=="*")
        $sql = "select * from t_news where delId=1 order by hitCounts desc ";
    else
        $sql = "select * from t_news where lanmuId = '$id'and delId = 1 order by hitCounts desc ";
    $res=$pdo->prepare($sql);
    $res->execute();
    $sth=$res->fetchAll();

    if($id=="*")
        $ss = "select * from t_news where delId = 1";
    else
        $ss = "select * from t_news where delId = 1 and lanmuId ='$id'";

    $data = $pdo -> prepare($ss);
    $data -> execute();
    $data = $data -> fetchAll();
//    $data = $pdo->query($ss)->fetchAll();
    $num = 3;

    $count = count($data);
    $w = ceil($count / $num);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //var_dump($w);
    $offset = ($page - 1) * $num;
    //var_dump($offset);
    $ss = "select * from t_news where delId = 1 and lanmuId = '$id' limit $offset,$num";
    $data = $pdo->query($ss)->fetchAll();
    $p = ($page == 1) ? 0 : ($page - 1);
    $n = ($page == $w) ? 0 : ($page + 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻列表</title>
    <link href="../css/show.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/showNews.css">
    <!--<link rel="stylesheet" href="../css/bootstrap.css">-->
    <!--<link rel="stylesheet" href="../css/font-awesome.min.css">-->
    <!--<link rel="stylesheet" href="../css/nprogress.css">-->
    <!--<link rel="stylesheet" href="../css/style.css">-->
    <script src="../js/jquery.min.js"></script>

</head>

<body>
<div id="box">
    <div id="contentBox">
        <div id="header"></div>
        <div id="content">
            <div id="menu">
                <ul id="menu_list">
                    <li><a class="linkNews" href="show.html">首页</a></li>
                    <li><a class="linkNews" href="showLists.php?id=1">国际新闻</a></li>
                    <li><a class="linkNews" href="showLists.php?id=2">军事新闻</a></li>
                    <li><a class="linkNews" href="showLists.php?id=3">体育新闻</a></li>
                    <li><a class="linkNews" href="showLists.php?id=4">国内要事</a></li>
                </ul>
                <div id="search">
                    <input type="text" id="search-news" placeholder="搜索...">
                    <button id="btnSearch" style="width: 60px"><span id="spanSearch" style="top: 0px;">搜索</span></button>
                </div>
            </div>

            <div id="divHot">
                <span id="spanNews">热点新闻</span><br>
                <span class="spanTitle">标题</span>
                <span class="spanHit">点击数</span>
                <?php
                    $i=0;
                    foreach ($sth as $row)
                    {
                        echo '<span class="spanTitle">';
                        if($i++<5)
                        {
                            if(strlen($row['title'])>10)
                            {
                                echo mb_substr($row['title'],0,10,"utf-8")."...";
                            }
                            else
                                echo $row['title'];
                            echo '</span>';
                            echo '<span class="spanHit">'.$row['hitCounts'];
                        }
                        echo '</span>';
                    }
                ?>
            </div>

            <div id="showNewsList">
                <span class="Title">标题</span>
                <span class="auther">作者</span>
                <span class="time">时间</span>
                <?php
                    $i = 0;
                    foreach ($data as $row)
                    {
                        echo '<a href = "showNews.php?id='.$row['newId'].'">';

                        echo '<span class="Title">';
                        if(strlen($row['title'])>15)
                        {
                            echo mb_substr($row['title'],0,15,"utf-8")."...";
                        }
                        else
                            echo $row['title'];
                        echo "</span></a>";
                        echo '<span class="auther">'.$row['userName'].'</span>';
                        echo '<span class="time">'.$row['addTime'].'</span>';
                    }
                ?>
                <div id="pagination">
                <?php
                    if ($page==1){
                        echo "首页";
                    }else{
                        echo "<a href='?page=1&id=$id'>首页</a>";
                    }
                    if ($p){
                        echo "<a href='?page={$p}&id=$id'>上一页</a>";
                    }else{
                        echo "上一页";
                    }
                    if ($n){
                        echo "<a href='?page={$n}&id=$id'>下一页</a>";
                    }else{
                        echo "下一页";
                    }
                    if($page== $w){
                        echo "尾页";
                    }else{
                        echo "<a href='?page={$w}&id=$id'>尾页</a>";
                    }

                ?>

                </div>
            </div>
        </div>
        <div id="footer">
            <div id="links">
                <p><a class="linkNews" href="http://www.cslg.edu.cn">学校官网</a></p>
                <p>Copyright © 2019 常熟理工学院 All rights reserved. 苏ICP备05026756号 苏公网安备 32058102001107号</p>
                <p>地址：江苏省常熟市南三环路99号（东湖校区） 湖山路99号（东南校区）</p>
                <p>电话：0512-52251113 普通高考招生热线：52251131 邮编：215500</p>
            </div>
            <div id="info">
                <p><a class="linkNews" href="../users/index.html">栏目管理员</a></p>
                <p><a class="linkNews" href="../admin/login.html">超级管理员登录</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

