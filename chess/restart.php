<?php
include "./function.php";           //调用自定义函数文件
include "./conn/conn.php";          //连接数据源文件
mysqli_query($connID,"update tb_room set chess = '$c',flag = 'host',moved = '',eated = '', guest_win = '".$_GET['guest_win']."', host_win = '".$_GET['host_win']."' where id = '".$_GET['roomid']."'");             //更新数据表中的数据信息
?>