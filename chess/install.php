<?php
if(isset($_POST['server']) && isset($_GET['action']) && $_GET['action'] == 'install'){//如果参数action的值为install
    if(!@$connID=mysqli_connect($_POST['server'], $_POST['username'], $_POST['password'])){//如果没有成功连接数据库
        echo "<script>alert('数据库连接失败！');</script>";          //弹出提示信息
    }else{       //否则，连接数据源文件
        $conn = file_get_contents("./conn/conn.php");//读取数据源文件
        $conn = str_replace("db_user",$_POST['username'],$conn);        //执行字符串替换
        $conn = str_replace("db_pwd",$_POST['password'],$conn);     //执行字符串替换
        $conn = str_replace("db_name",$_POST['database'],$conn);     //执行字符串替换
        file_put_contents("./conn/conn.php",$conn);//将变量$conn的值写入文件
        $sql_file = file_get_contents("./sql.txt");    //读取数据库文件的内容并返回到字符串中
        if(!mysqli_select_db($connID,$_POST['database'])){//如果数据库不存在
            mysqli_query($connID,"CREATE DATABASE ".$_POST['database']);//创建数据库
        }else{
			mysqli_query($connID,"drop table if exists tb_room");//如果tb_room表存在则删除该表
		}
        mysqli_select_db($connID,$_POST['database']);//选择数据库
        if(mysqli_query($connID,$sql_file)){            //如果成功执行脚本文件，则跳转到游戏首页
            header("location:index.php");     //跳转到游戏首页
            exit;
        }else{
            echo "<script>alert('数据库安装操作失败！');</script>";//弹出对话框
        }
    }
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <meta charset="UTF-8">
    <title>数据库安装程序</title>
    <link rel="stylesheet" href="css/install.css" />        <!--链接外部CSS文件-->
</head>
<body>
<form name="form" method="post" action="install.php?action=install" id="form">  <!--创建用户输入表单-->
    <table class="tab" align="left">
        <tr>
            <td width="100" height="46" align="right">
                <span class="style1">服务器：</span>
            </td>
            <td width="275" class="input">
                <input name="server" type="text" value="127.0.0.1" class="text">  <!--添加文本框-->
            </td>
        </tr>
        <tr>
            <td width="100" height="46" align="right">
                <span class="style1">数据库：</span>
            </td>
            <td class="input">
                <input name="database" type="text" class="text">   	<!--添加文本框-->
            </td>
        </tr>
        <tr>
            <td width="100" height="46" align="right">
                <span class="style1">DB账号：</span>
            </td>
            <td class="input">
                <input name="username" type="text" class="text">     <!--添加文本框-->
            </td>
        </tr>
        <tr>
            <td width="100" height="46" align="right">
                <span class="style1">DB密码：</span>
            </td>
            <td class="input">
                <input name="password" type="text" class="text">      <!--添加文本框-->
            </td>
        </tr>
        <tr align="center">
            <td height="46" colspan=2>
                <input type="submit" value="" class="setup_button" >&nbsp;   <!--添加安装按钮-->
                <input type="reset" value="" class="clear_button">           <!--添加清除按钮-->
            </td>
        </tr>
    </table>
</form>
</body>
</html>
