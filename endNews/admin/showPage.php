<?php

    require "pdoConnect.php";

    $sql = "select * from t_lanmu where lanmudel = 1";
    //执行查询，返回结果集对象
    $res = $pdo->prepare($sql);
    $res -> execute();
    $sth = $res -> fetchAll();
    $str = "";
    $i = 1;
    if (count($res))
    {

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 发布新闻</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="page.php">
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="title" value="" data-validate="required:请填写标题" />
          <div class="tips"></div>
        </div>
      </div>

      <!--类型-->
      <div class="form-group">
        <div class="label">
          <label>类型：</label>
        </div>
        <div class="field" style="margin-top: 8px;">
            <?php
                foreach ($sth as $row)
                {
                    $str = $row['lanmuName'];
                    if($i == 1)
                        echo '<label><input type="radio" class="radio" name="lanmuId" checked value="'.$i++.'">'.$str.'</label>&nbsp;&nbsp;&nbsp;&nbsp;';
                    else
                        echo '<label><input type="radio" class="radio" name="lanmuId" value="'.$i++.'">'.$str.'</label>&nbsp;&nbsp;&nbsp;&nbsp;';
                }
                $pdo = null;
            }
            ?>
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
          <textarea name="contents" data-validate="required:请填写内容" cols="120" rows="50"></textarea>
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>