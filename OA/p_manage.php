<?php
    include "inc/check.php";                                //����Ȩ���ļ�
    include("system/system.inc.php");                       //�������ʵ�����ļ�
    $sqlstr = "select id,p_time,p_title from tb_person";    //����SQL���
    $res    = $admindb->ExecSQL($sqlstr,$conn);             //ִ��SQL���
    $smarty->assign("res",$res);                            //����ѯ�������ģ�����
    $smarty->display("rsxx/p_manage.html");                 //ָ��ģ��ҳ
?>