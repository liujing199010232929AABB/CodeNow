<?php
include "./function.php";        //�����Զ��庯���ļ�
include "./conn/conn.php";       //��������Դ�ļ�
if($_GET['message'])         //����ɹ���ȡ������Ϣ
    mysqli_query($connID,"update tb_room set `message_".$_GET['site']."` = '".$_GET['message']."' where id = '".$_GET['roomid']."'");     //�������ݱ��еļ�¼��Ϣ
?>