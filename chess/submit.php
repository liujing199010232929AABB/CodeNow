<?php
include "./function.php";        //���ú����ļ�
include "./conn/conn.php";       //��������Դ�ļ�
$query = mysqli_query($connID,"select * from tb_room where id = '".$_GET['roomid']."'");      //�������������Ӧ����Ϣ
$row = mysqli_fetch_array($query);//����ѯ��������ص�������
$chess = $row['chess'];//��ȡchess�ֶε�ֵ
$chess_explode = explode(",", $chess);       //Ӧ�ö��ŷָ����ָ�����
$eated = "";//��ʼ������
for($c = "", $i = 0;$i < sizeof($chess_explode);$i++){       //�ؽ���λ���������ӵ�����λ��
    $new_chess = $chess_explode[$i];      //��ȡ���飨���ӣ��е�Ԫ��
    if($i + 1 == $_GET['from'])             //��ȡ���ӵ���ʼλ�ã�����i��1������Ϊ�����1��ʼ
        $new_chess = "blank";              //���������衰blank.png����ͼ��
    if($i + 1 == $_GET['to'])  {           //��ȡ���ӵ���Ծ��λ�ã���Ŀ�����꣬����i��1������Ϊ�����1��ʼ
        if($chess_explode[$i] != "blank")  //������������ӵ�ֵ������blank
            $eated = $chess_explode[$i];      //�����Ե������ӵ�Ԫ��ֵ�������������硰006������
        $new_chess = $chess_explode[$_GET['from'] - 1];//����������Ӹ�������
    }
    $c .= $new_chess.",";              //�Զ���Ϊ�ָ������ӵ�ǰ�������ӵ����
}
if($_GET['site'] == "guest")         //�����ǰ�����Ϊ�������
    $flag = "host";                //�������־����Ϊ�������
else                        //�����ǰ�����Ϊ�������
    $flag = "guest";            //�������־����Ϊ�������
//�������ӵ�λ�ã������־�������ƶ���λ�ã����Ե������ӵ���ص�������Ϣ
mysqli_query($connID,"update tb_room set chess = '$c', flag = '$flag', moved = '".$_GET['from'].",".$_GET['to']."', eated = '$eated' where id = '".$_GET['roomid']."' limit 1");
?>