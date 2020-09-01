<?php
include "./function.php";              //调用函数文件
include "./conn/conn.php";             //调用数据源连接文件
if($_POST['nick_name'] == ''){          //如果用户名称为空
    setcookie("message", "名字不能为空！");      //弹出提示信息
    header("location:index.php");        //跳转到游戏首页
    exit;                          //退出
}
if(strlen($_POST['nick_name']) > 13){                 //如果用户名长度大于25个字节
    setcookie("message", "玩家名称不能超过13个字符！");       //弹出提示信息
    header("location:index.php");        //跳转到游戏首页
    exit;                          //退出
}
$query = mysqli_query($connID,"select count(*) as 'num' from tb_room where host = '".$_POST['nick_name']."' or guest = '".$_POST['nick_name']."' limit 1");//执行查询语句
$row = mysqli_fetch_array($query);//将查询结果集返回到数组中
$num = $row['num'];//获取num字段的值并赋值给变量
if($num!=0){                  //如果用户创建的名称已经存在
    setcookie("message", "该昵称已被占用！");           //弹出提示信息
    header("location:index.php");        //跳转到游戏首页
    exit;                          //退出
}
setcookie("username", $_POST['nick_name']);          //弹出用户名称，并转换用户名中的特殊字符
header("location:index.php");           //跳转到游戏首页
?>