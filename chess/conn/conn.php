<?php
$connID=mysqli_connect("127.0.0.1", "root", "root");        //连接MySQL服务器，用户名为root，密码为root
mysqli_query($connID,"set names 'gb2312'");                 //指定数据库的编码类型为gb2312类型
if(!@mysqli_select_db($connID,"db_name")){//如果数据库不存在
    header("location:install.php");                      //则加载install.php页
    exit;                                      //退出
}
if(isset($_COOKIE['username'])){
    $username = $_COOKIE['username'];          //将存储在Cookie中的用户名存储在变量$username中
}else{
    $username = GetIP();                           //获取用户的IP，GetIP()方法在function.php文件中
}
?>