<?php
include "./function.php";     //���ú����ļ�
include "./conn/conn.php";    //��������Դ�ļ�
$query = mysqli_query($connID,"select * from tb_room where id = '".$_GET['roomid']."'");     //�����������Ϣ
$row = mysqli_fetch_array($query);//����ѯ��������ص�������
$guest = $row['guest'];//��ȡ��ѯ�����guest�ֶε�ֵ
$host = $row['host'];//��ȡ��ѯ�����host�ֶε�ֵ
if($guest == '' && $host == ''){      //���������Һͺ���������ƶ�Ϊ��
    mysqli_query($connID,"update tb_room set host = '$username',time_host = '".time()."',time = '".time()."' where id = '".$_GET['roomid']."'");//ִ�и������
}elseif($guest != '' && $host != ''){//���������Һͺ���������ƶ���Ϊ��
    setcookie("message","����Ϊ����");        //����Cookie����message��ֵ
    header("location:index.php");                 //��ת����Ϸ��ҳ
    exit;        //�˳�
}elseif($host != '' && $guest == '' && $username != $host){                //�������������Ʋ�Ϊ�գ������������Ϊ�գ����Һ���������Ʋ����ں����������
    mysqli_query($connID,"update tb_room set guest = '$username',time_guest = '".time()."',time = '".time()."' where id = '".$_GET['roomid']."'");//ִ�и������
}elseif($guest != '' && $host == ''){//�������������Ʋ�Ϊ�գ������������Ϊ��
    mysqli_query($connID,"update tb_room set guest = '',host = '$username',flag = 'host',chess = '".$c."',time_host = '".time()."',time = '".time()."',moved='',eated='',guest_win='0',host_win='0',message_guest= '',message_host='' where id = '".$_GET['roomid']."'");//ִ�и������
}else{
    setcookie("message","���ǳ��ѱ�ռ�ã��������");         //����Cookie����message��ֵ
    header("location:index.php");                 //��ת����Ϸ��ҳ
    exit;        //�˳�
}
header("location:room.php?id=".$_GET['roomid']);      //����ָ��ID�ŵ���Ϸ����
exit;        //�˳�
?>