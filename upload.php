<?php
@session_start();
if(!isset($_SESSION['login_user'])){
    Header("HTTP/1.1 303 See Other");
    Header("Location: ./login.php");
    exit;
}

if($_POST['submit']){
    var_dump($_FILES);
    if ($_FILES['filename']['type']!="application/x-zip-compressed"){
        echo "zouzouzou";
        Header("Location: ./index.php");
        exit;
    }
    $tmpname=$_FILES['filename']['tmp_name'];
    $filename=$_FILES['filename']['name'];
    $path=getcwd();//获取当前目录的绝对路径
    $filepath=$path.'\\'.$filename;
    echo $filepath;
    move_uploaded_file($tmpname, $filename);
    $path = "";
//
//    $obj=new com('wscript.shell');
//    //双引号可以解析变量
//    $obj->run("winrar x $filepath $path",1,true);
//    //删除源文件
    @unlink($filename);


}