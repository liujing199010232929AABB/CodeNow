<?php
    include("system/system.inc.php");       //�������ʵ�����ļ�
    $sqlstr = "select * from tb_setup";     //����tb_setup��
    $rec=$admindb->ExecSQL($sqlstr,$conn);  //ִ�в�ѯ���
    $smarty->assign("rec",$rec);            //����ѯ�������ģ�����
    $smarty->display("kqgl/set_time.html"); //ָ��ģ��ҳ
?>
