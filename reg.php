<?php
include_once "./lib/dbHelper.class.php";
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $db = new dbHelper();
    $sql = "SELECT * FROM ip_user WHERE `username` = '$username'";
    $result = $db->getValueBySelfCreateSql($sql);
    if ($result != null){
        echo "<script language=\"JavaScript\">alert(\"用户名被占用了！换一个！！\");</script>";
    }else{
        $sql = "INSERT INTO ip_user (`username`,`password`) VALUES ('$username','$password')";
        $result = $db->exec($sql);
        if ($result){
            Header("Location: ./login.php");
        }else{
            echo "<script language=\"JavaScript\">alert(\"注册失败！\");</script>";
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>iPreview-树莓派</title>
    <link href="css/base.css" rel="stylesheet">
</head>
<body>
<div class="page_login">
    <div class="main">
        <div class="title">
            <div class="title_name">iPreview</div>
            <div class="title_desc">用户注册</div>
        </div>
        <div class="form_box">
            <form method="post" action="">
                <div class="form_line">
                    <input type="text" name="username" id="username" placeholder="请输入用户名">
                </div>
                <div class="form_line">
                    <input type="password" name="password" id="password" placeholder="请输入密码">
                </div>
                <div class="form_line">
                    <input type="submit" value="注册">
                </div>
            </form>
        </div>

    </div>
</div>
</body>
</html>
