<?php
    header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
    include "../inc/check.php"; //����Ȩ�޼���ļ�
    include "../conn/conn.php"; //�������ݿ������ļ�
    include "../inc/func.php";  //�����Զ��庯���ļ�
    $sqlstr = "delete from tb_depart where id = ".$_GET['id'];  //ɾ��tb_depart������
    $result = sqlsrv_query($conn,$sqlstr);
    re_message($result,"show_depart.php");
?>