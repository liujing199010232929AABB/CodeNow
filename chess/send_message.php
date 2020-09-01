<?php
include "./function.php";        //调用自定义函数文件
include "./conn/conn.php";       //连接数据源文件
if($_GET['message'])         //如果成功获取聊天信息
    mysqli_query($connID,"update tb_room set `message_".$_GET['site']."` = '".$_GET['message']."' where id = '".$_GET['roomid']."'");     //更新数据表中的记录信息
?>