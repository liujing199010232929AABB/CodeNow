<?php
include "./function.php";           //�����Զ��庯���ļ�
include "./conn/conn.php";          //��������Դ�ļ�
mysqli_query($connID,"update tb_room set chess = '$c',flag = 'host',moved = '',eated = '', guest_win = '".$_GET['guest_win']."', host_win = '".$_GET['host_win']."' where id = '".$_GET['roomid']."'");             //�������ݱ��е�������Ϣ
?>