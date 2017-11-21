<?php
@session_start();
if(!isset($_SESSION['login_user'])){
    Header("HTTP/1.1 303 See Other");
    Header("Location: ./login.php");
    exit;
}
$user = $_SESSION['login_user'];
if($_POST['submit']){
    echo "上传中···\n";
    //var_dump($_FILES);
    $tmpname=$_FILES['filename']['tmp_name'];
    $filename=$_FILES['filename']['name'];
    $fileExtArray = explode('.',$filename);
    $fileExt = strtolower($fileExtArray[count($fileExtArray)-1]);
    if ($fileExt!='zip'){
        //echo "zouzouzou";
        Header("Location: ./index.php");
        exit;
    }

    $path=getcwd();//获取当前目录的绝对路径
    $filepath=$path.'/'.$filename;
    //DO 转到工作目录 1、创建用户的文件夹 2、判断用户文件夹是否存在 不存在则创建之 3、判断用户文件夹里是否有文件 若有则删除之
    $userPath = $path."/$user/";
    if (is_dir($userPath)){
        deldir($userPath);
    }
    mkdir($userPath,0755);
    $filePath = $userPath.$filename;
    move_uploaded_file($tmpname, $filePath);
    echo "上传成功！\n";
    echo "解压中···\n";
    //DO 执行解压操作
    $zip = new ZipArchive;
    $res = $zip->open($filePath);
    if ($res === TRUE) {
        //解压缩到test文件夹
        $zip->extractTo($userPath);
        $zip->close();
    } else {
        echo 'failed, code:' . $res;
    }
    @unlink($filePath);

    echo "解压成功！\n";
    echo "<a href='index.php'>返回上一页</a>";




}
function deldir($dir) {
    //先删除目录下的文件：
    $dh=opendir($dir);
    while ($file=readdir($dh)) {
        if($file!="." && $file!="..") {
            $fullpath=$dir."/".$file;
            if(!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                deldir($fullpath);
            }
        }
    }
    closedir($dh);
    //删除当前文件夹：
    if(rmdir($dir)) {
        return true;
    } else {
        return false;
    }
}

