<?php
include "./function.php";                       //载入自定义函数文件
include "./conn/conn.php";                      //载入数据源连接文件
mysqli_query($connID,"delete from tb_room where id= '".$_GET['roomid']."'");      //删除指定的游戏房间
header('location:index.php');                    //定位到首页
?>