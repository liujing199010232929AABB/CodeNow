<?php
    include "inc/check.php";            //�ж��û�Ȩ��
    include("system/system.inc.php");   //�������ʵ�����ļ�
    $sqlstr = "select * from tb_person where id=".$_GET['id'];
    $res=$admindb->ExecSQL($sqlstr,$conn);  //ִ�в�ѯ
    $smarty->assign("res",$res);//����ѯ�������ģ�����
    $smarty->display("rsxx/m_message.html");//ָ��ģ��ҳ
?>