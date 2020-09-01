<?php
include "./function.php";              //调用自定义函数文件
include "./conn/conn.php";             //连接数据源文件
$query = mysqli_query($connID,"select * from tb_room"); //执行查询语句
while($row = mysqli_fetch_array($query)){//将查询结果循环返回到数组中
    //删除无用房间
    mysqli_query($connID,"delete from tb_room where ".(time()-$row['time']).">5");
}
if(isset($_COOKIE['message'])){//如果Cookie变量message的值被设置
    echo "<script>alert('".$_COOKIE['message']."');</script>";//弹出对话框
    setcookie("message", null);//设置Cookie变量message的值为null
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>网络象棋游戏</title>
    <link rel="stylesheet" href="css/index.css" />
</head>
<body>
<table class="tab">
    <tr>
        <td height="40"><span class="style1">您的昵称：</span></td>
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
        <td height="40"><span class="style1">游戏房间：</span></td>
    </tr>
    <tr>
        <td height="46">
            <form name="form" method="post" action="add_d.php">
                <table width="460" border="0">
                    <tr>
                        <td width="360" height="46" class="input">
                            <input name="play_room" type="text" value="<?php echo time()."号";?>" size="16" class="text"/>
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
    $query = mysqli_query($connID,"select * from tb_room");          //检索数据库中的数据信息
    $info=mysqli_fetch_array($query);//将查询结果集返回到数组中
    do{
        $r_num = 0;                            //变量初始化
        if($info['host'])                       //如果红旗旗主的值存在
            $r_num ++;                      //变量自加1操作
        if($info['guest'])                   //如果黑旗旗主的值存在
            $r_num ++;                      //变量自加1操作
        if($info['id']!=""){
            ?>
            <tr>
                <td height="28" valign="middle"><img src="images/room.gif" width="15" height="17" />
                    <a href="join.php?roomid=<?php echo $info['id'];?>" ><font color="#990000"><?php echo $info['name'];?></font></a>（<?php echo $r_num;?>人/2人）[<a href="join.php?roomid=<?php echo $info['id'];?>">进入房间</a>]
                </td>
            </tr>
            <?php
        }
    }while($info=mysqli_fetch_array($query));//循环输出查询结果
    ?>
</table>
</body>
</html>