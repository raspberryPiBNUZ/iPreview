<?php
@session_start();
include_once "./lib/dbHelper.class.php";
if(isset($_SESSION['login_user'])){
    Header("HTTP/1.1 303 See Other");
    Header("Location: ./index.php");
    exit;
}
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $db = new dbHelper();
    $sql = "SELECT * FROM ip_user WHERE `username` = '$username' AND `password`='$password'";
    $result = $db->getValueBySelfCreateSql($sql);
    if ($result != null){
        @session_start();
        $_SESSION['login_user'] = $username;
        Header("Location: ./index.php");
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
            <div class="title_desc">手机预览无压力</div>
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
                    <input type="submit" value="登录">
                </div>
            </form>
        </div>

    </div>
</div>
</body>
</html>
