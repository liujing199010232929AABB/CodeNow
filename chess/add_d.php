<?php
if($_POST['play_room'] == ''){                   //�����������Ϊ��
    setcookie("message", "��Ϸ�������Ʋ���Ϊ�գ�");         //������ʾ��Ϣ
    header("location:index.php");                 //�����������Ϊ�գ��򷵻���ҳ
    exit;
}
include "./function.php";           //���ú�����
include "./conn/conn.php";          //��������Դ�ļ�
$query = mysqli_query($connID,"insert into tb_room(id,name,chess,time)
                              values (NULL,'".$_POST['play_room']."','$c','".time()."')");
$id = mysqli_insert_id($connID);                              //��ȡINSERT����������ID��
if($id){      //���id���߼�ֵΪ��
    header("location:join.php?roomid=".$id);               //���뷿��
    setcookie("message","�й�����������Ϸ��ӭ���ļ��ˣ���Ϸ���䴴���ɹ���");         //������ʾ��Ϣ
}
?>