<?php
@session_start();
if(!isset($_SESSION['login_user'])){
    Header("HTTP/1.1 303 See Other");
    Header("Location: ./login.php");
    exit;
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
    <div class="info">
        <?php echo $_SESSION['login_user']?> <a href="./logout.php">退出</a>
    </div>
    <div class="page_index">
        <div class="main">
            <div class="form_box">
                <form method="post" action="./upload.php" enctype="multipart/form-data">
                    <div class="form_line">
                        <input type="file" name="filename">
                    </div>
                    <div class="form_line">
                        <input type="submit" name="submit" value="上传">
                    </div>
                </form>
                <div style="padding-top: 50px">
                    <p>上传你成功后，您可以使用这个地址，在微信、浏览器等地方，访问您的网页</p>
                    <p style="padding-top: 20px;font-size: 20px;color: #f04f5b">http://dmt.clubunion.cn/<?php echo $_SESSION['login_user']?></p>
                </div>

            </div>

        </div>
    </div>
</body>
</html>
