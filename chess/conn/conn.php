<?php
$connID=mysqli_connect("127.0.0.1", "root", "root");        //����MySQL���������û���Ϊroot������Ϊroot
mysqli_query($connID,"set names 'gb2312'");                 //ָ�����ݿ�ı�������Ϊgb2312����
if(!@mysqli_select_db($connID,"db_name")){//������ݿⲻ����
    header("location:install.php");                      //�����install.phpҳ
    exit;                                      //�˳�
}
if(isset($_COOKIE['username'])){
    $username = $_COOKIE['username'];          //���洢��Cookie�е��û����洢�ڱ���$username��
}else{
    $username = GetIP();                           //��ȡ�û���IP��GetIP()������function.php�ļ���
}
?>