<?php
if(isset($_POST['server']) && isset($_GET['action']) && $_GET['action'] == 'install'){//�������action��ֵΪinstall
    if(!@$connID=mysqli_connect($_POST['server'], $_POST['username'], $_POST['password'])){//���û�гɹ��������ݿ�
        echo "<script>alert('���ݿ�����ʧ�ܣ�');</script>";          //������ʾ��Ϣ
    }else{       //������������Դ�ļ�
        $conn = file_get_contents("./conn/conn.php");//��ȡ����Դ�ļ�
        $conn = str_replace("db_user",$_POST['username'],$conn);        //ִ���ַ����滻
        $conn = str_replace("db_pwd",$_POST['password'],$conn);     //ִ���ַ����滻
        $conn = str_replace("db_name",$_POST['database'],$conn);     //ִ���ַ����滻
        file_put_contents("./conn/conn.php",$conn);//������$conn��ֵд���ļ�
        $sql_file = file_get_contents("./sql.txt");    //��ȡ���ݿ��ļ������ݲ����ص��ַ�����
        if(!mysqli_select_db($connID,$_POST['database'])){//������ݿⲻ����
            mysqli_query($connID,"CREATE DATABASE ".$_POST['database']);//�������ݿ�
        }else{
			mysqli_query($connID,"drop table if exists tb_room");//���tb_room�������ɾ���ñ�
		}
        mysqli_select_db($connID,$_POST['database']);//ѡ�����ݿ�
        if(mysqli_query($connID,$sql_file)){            //����ɹ�ִ�нű��ļ�������ת����Ϸ��ҳ
            header("location:index.php");     //��ת����Ϸ��ҳ
            exit;
        }else{
            echo "<script>alert('���ݿⰲװ����ʧ�ܣ�');</script>";//�����Ի���
        }
    }
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <meta charset="UTF-8">
    <title>���ݿⰲװ����</title>
    <link rel="stylesheet" href="css/install.css" />        <!--�����ⲿCSS�ļ�-->
</head>
<body>
<form name="form" method="post" action="install.php?action=install" id="form">  <!--�����û������-->
    <table class="tab" align="left">
        <tr>
            <td width="100" height="46" align="right">
                <span class="style1">��������</span>
            </td>
            <td width="275" class="input">
                <input name="server" type="text" value="127.0.0.1" class="text">  <!--����ı���-->
            </td>
        </tr>
        <tr>
            <td width="100" height="46" align="right">
                <span class="style1">���ݿ⣺</span>
            </td>
            <td class="input">
                <input name="database" type="text" class="text">   	<!--����ı���-->
            </td>
        </tr>
        <tr>
            <td width="100" height="46" align="right">
                <span class="style1">DB�˺ţ�</span>
            </td>
            <td class="input">
                <input name="username" type="text" class="text">     <!--����ı���-->
            </td>
        </tr>
        <tr>
            <td width="100" height="46" align="right">
                <span class="style1">DB���룺</span>
            </td>
            <td class="input">
                <input name="password" type="text" class="text">      <!--����ı���-->
            </td>
        </tr>
        <tr align="center">
            <td height="46" colspan=2>
                <input type="submit" value="" class="setup_button" >&nbsp;   <!--��Ӱ�װ��ť-->
                <input type="reset" value="" class="clear_button">           <!--��������ť-->
            </td>
        </tr>
    </table>
</form>
</body>
</html>
