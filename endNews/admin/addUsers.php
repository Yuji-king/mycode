<?php
    require "pdoConnect.php";

    $sql = "select * from t_lanmu";
    $res = $pdo -> prepare($sql);
    $res -> execute();
    $sth = $res -> fetchAll();
    $i = 1;
    $str = "";
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>添加用户</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-key"></span>编辑用户</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="usersAdd.php">
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
                    ?>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">帐号：</label>
                </div>
                <div class="field">
                    <label style="line-height:33px;">
                        <input type="text" class="input w50" id="username" name="username" size="50" placeholder="请输入用户名" data-validate="required:用户名不能为空" />
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">原始密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" id="mpass" name="mpass" size="50" placeholder="请输入原始密码" data-validate="required:请输入原始密码" />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">新密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" name="newpass" size="50" placeholder="请输入新密码" data-validate="required:请输入新密码,length#>=5:新密码不能小于5位" />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">确认新密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" name="renewpass" size="50" placeholder="请再次输入新密码" data-validate="required:请再次输入新密码,repeat#newpass:两次输入的密码不一致" />
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
