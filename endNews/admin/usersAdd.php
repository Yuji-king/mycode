<?php
    require "pdoConnect.php";

    $username = $_POST['username'];
    $lanmuId = $_POST['lanmuId'];
    $password = md5(trim($_POST['mpass']));
    $newpass =  md5(trim($_POST['newpass']));

    $sql = "select * from t_user where (userName = '$username' and userPwd = '$password' )";
    $sql2 = "update t_user set lanmuId = '$lanmuId',userPwd = '$newpass' where userName ='$username'";
    $sql3 = "insert into t_user (userName,userPwd,lanmuId) values ('$username','$newpass','$lanmuId')";
    $res = $pdo -> prepare($sql);
    $res -> execute();
    $res = $res -> fetchAll();


    if(count($res) > 0)
    {
        foreach ($res as $row)
        {
            if($row['userName']==$username && $row['userPwd'] == $password)
            {
                $sth = $pdo -> exec($sql2);
                if($sth)
                {
                    $res1 = '成功修改了'.$sth.'条记录';
                    echo "<div class=\"container\">
                            <div class=\"jumbotron\">
                                <h2 style='color: #30ff09;'>{$res1}</h2>	
                            </div>
                          </div>";
                }
                else
                {
                    echo "修改信息失败！";
                }
            }
        }
    }
    else
    {
        $sth = $pdo -> exec($sql3);
        if($sth)
        {
            $res1 = '成功增加了'.$sth.'条记录';
            echo "<div class=\"container\">
                    <div class=\"jumbotron\">
                        <h2 style='color: #30ff09;'>{$res1}</h2>	
                    </div>
                  </div>";
        }
        else
        {
            echo "添加信息失败！";
        }
    }

    $pdo = null ;
