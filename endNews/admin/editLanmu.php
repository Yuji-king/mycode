<?php
    require "pdoConnect.php";

    $getId = $_GET['lanmuId'];

    $sql = "select * from t_lanmu where lanmuId = $getId";
    $sth = $pdo ->prepare($sql);
    $sth -> execute();
    $res = $sth -> fetchAll();

    $lanmuId = "";
    $lanmuName = "";

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
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span>修改栏目</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="<?php echo "showSetLanmu.php?lanmuId=$getId" ?>">
            <?php foreach ($res as $row){ $lanmuName=$row['lanmuName']; $lanmuId=$row['lanmuId']; }?>
            <div class="form-group">
                <div class="label">
                    <label>栏目：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="lanmuName" value="<?php echo $lanmuName ?>" data-validate="required:请填写标题" />
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
