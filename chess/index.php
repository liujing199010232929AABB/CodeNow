<?php
include "./function.php";              //�����Զ��庯���ļ�
include "./conn/conn.php";             //��������Դ�ļ�
$query = mysqli_query($connID,"select * from tb_room"); //ִ�в�ѯ���
while($row = mysqli_fetch_array($query)){//����ѯ���ѭ�����ص�������
    //ɾ�����÷���
    mysqli_query($connID,"delete from tb_room where ".(time()-$row['time']).">5");
}
if(isset($_COOKIE['message'])){//���Cookie����message��ֵ������
    echo "<script>alert('".$_COOKIE['message']."');</script>";//�����Ի���
    setcookie("message", null);//����Cookie����message��ֵΪnull
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>����������Ϸ</title>
    <link rel="stylesheet" href="css/index.css" />
</head>
<body>
<table class="tab">
    <tr>
        <td height="40"><span class="style1">�����ǳƣ�</span></td>
    </tr>
    <tr>
        <td height="46">
            <form name="form" method="post" action="change_name.php">
                <table width="460" border="0">
                    <tr>
                        <td width="360" height="46" class="input">
                            <input name="nick_name" type="text" value="<?php echo $username;?>" class="text">
                        </td>
                        <td width="100" height="46">
                            <input type="submit" value="" class="change_button">
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <tr>
        <td height="40"><span class="style1">��Ϸ���䣺</span></td>
    </tr>
    <tr>
        <td height="46">
            <form name="form" method="post" action="add_d.php">
                <table width="460" border="0">
                    <tr>
                        <td width="360" height="46" class="input">
                            <input name="play_room" type="text" value="<?php echo time()."��";?>" size="16" class="text"/>
                        </td>
                        <td width="100" height="46">
                            <input type="submit" value="" class="create_button">
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
<table class="tab1">
    <?php
    $query = mysqli_query($connID,"select * from tb_room");          //�������ݿ��е�������Ϣ
    $info=mysqli_fetch_array($query);//����ѯ��������ص�������
    do{
        $r_num = 0;                            //������ʼ��
        if($info['host'])                       //�������������ֵ����
            $r_num ++;                      //�����Լ�1����
        if($info['guest'])                   //�������������ֵ����
            $r_num ++;                      //�����Լ�1����
        if($info['id']!=""){
            ?>
            <tr>
                <td height="28" valign="middle"><img src="images/room.gif" width="15" height="17" />
                    <a href="join.php?roomid=<?php echo $info['id'];?>" ><font color="#990000"><?php echo $info['name'];?></font></a>��<?php echo $r_num;?>��/2�ˣ�[<a href="join.php?roomid=<?php echo $info['id'];?>">���뷿��</a>]
                </td>
            </tr>
            <?php
        }
    }while($info=mysqli_fetch_array($query));//ѭ�������ѯ���
    ?>
</table>
</body>
</html>