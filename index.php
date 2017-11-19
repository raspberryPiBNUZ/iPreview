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
            </div>
        </div>
    </div>
</body>
</html>
