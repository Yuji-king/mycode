<?php
    require "pdoConnect.php";

    $getId = $_GET['newId'];

    $sql = "select * from t_news where newId = $getId";
    $sth = $pdo ->prepare($sql);
    $sth -> execute();
    $res = $sth -> fetchAll();

    $title = "";
    $lanmuId = "";
    $contents = "";

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
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span>修改新闻</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="<?php echo "showSetNews.php?newId=$getId" ?>">
            <?php foreach ($res as $row){ $title=$row['title']; $lanmuId=$row['lanmuId']; $contents=$row['contents']; }?>
            <div class="form-group">
                <div class="label">
                    <label>标题：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="title" value="<?php echo $title ?>" data-validate="required:请填写标题" />
                    <div class="tips"></div>
                </div>
            </div>



            <!--类型-->
            <div class="form-group">
                <div class="label">
                    <label>类型：</label>
                </div>
            </div>



            <div class="form-group">
                <div class="label">
                    <label>内容：</label>
                </div>
                <div class="field">
                    <textarea name="contents" data-validate="required:请填写内容" cols="120" rows="50">
                        <?php echo $contents ?>
                    </textarea>
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