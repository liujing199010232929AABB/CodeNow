<?php
include "./function.php";              //���ú����ļ�
include "./conn/conn.php";             //��������Դ�����ļ�
if($_POST['nick_name'] == ''){          //����û�����Ϊ��
    setcookie("message", "���ֲ���Ϊ�գ�");      //������ʾ��Ϣ
    header("location:index.php");        //��ת����Ϸ��ҳ
    exit;                          //�˳�
}
if(strlen($_POST['nick_name']) > 13){                 //����û������ȴ���25���ֽ�
    setcookie("message", "������Ʋ��ܳ���13���ַ���");       //������ʾ��Ϣ
    header("location:index.php");        //��ת����Ϸ��ҳ
    exit;                          //�˳�
}
$query = mysqli_query($connID,"select count(*) as 'num' from tb_room where host = '".$_POST['nick_name']."' or guest = '".$_POST['nick_name']."' limit 1");//ִ�в�ѯ���
$row = mysqli_fetch_array($query);//����ѯ��������ص�������
$num = $row['num'];//��ȡnum�ֶε�ֵ����ֵ������
if($num!=0){                  //����û������������Ѿ�����
    setcookie("message", "���ǳ��ѱ�ռ�ã�");           //������ʾ��Ϣ
    header("location:index.php");        //��ת����Ϸ��ҳ
    exit;                          //�˳�
}
setcookie("username", $_POST['nick_name']);          //�����û����ƣ���ת���û����е������ַ�
header("location:index.php");           //��ת����Ϸ��ҳ
?>