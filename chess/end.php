<?php
include "./function.php";                       //�����Զ��庯���ļ�
include "./conn/conn.php";                      //��������Դ�����ļ�
mysqli_query($connID,"delete from tb_room where id= '".$_GET['roomid']."'");      //ɾ��ָ������Ϸ����
header('location:index.php');                    //��λ����ҳ
?>