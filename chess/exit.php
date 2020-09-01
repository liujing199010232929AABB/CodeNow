<?php
include "./function.php";                       //载入自定义函数文件
include "./conn/conn.php";                      //载入数据源连接文件
if(isset($_GET['site']))         //如果site参数被设置
    mysqli_query($connID,"update tb_room set ".$_GET['site']." = '',flag = '".($_GET['site']=='host'?'guest':'host')."', chess='".$c."', moved='',eated='',guest_win='0',host_win='0',message_guest= '',message_host='' where id = '".$_GET['roomid']."'");       //更新数据表中的记录信息
header('location:index.php');                    //定位到首页
?>