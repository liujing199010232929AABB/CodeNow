<?php
include "./function.php";                       //�����Զ��庯���ļ�
include "./conn/conn.php";                      //��������Դ�����ļ�
if(isset($_GET['site']))         //���site����������
    mysqli_query($connID,"update tb_room set ".$_GET['site']." = '',flag = '".($_GET['site']=='host'?'guest':'host')."', chess='".$c."', moved='',eated='',guest_win='0',host_win='0',message_guest= '',message_host='' where id = '".$_GET['roomid']."'");       //�������ݱ��еļ�¼��Ϣ
header('location:index.php');                    //��λ����ҳ
?>