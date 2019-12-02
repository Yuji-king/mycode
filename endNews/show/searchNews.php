<?php
    require "../admin/pdoConnect.php";
    $str = $_GET['search'];
    $sql = "select newId,contents,title from t_news where (contents like '%$str%' or title like '%$str%') and delId = 1";
    $newId = "";
    $res = $pdo ->prepare($sql);
    $res -> execute();
    $sth = $res -> fetchAll();
    if(count($sth)>0)
    {
        foreach ($sth as $row)
        {
            $newId = $row['newId'];
            echo '<script>window.location="showNews.php?id='.$newId.'"</script>';
        }
    }
    else{
        echo '<script>alert("新闻不存在！");window.location="show.html"</script>';
    }


    $pdo = null;
