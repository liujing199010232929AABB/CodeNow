<?php
if($_POST['play_room'] == ''){                   //如果房间名称为空
    setcookie("message", "游戏房间名称不能为空！");         //弹出提示信息
    header("location:index.php");                 //如果房间名称为空，则返回首页
    exit;
}
include "./function.php";           //调用函数库
include "./conn/conn.php";          //连接数据源文件
$query = mysqli_query($connID,"insert into tb_room(id,name,chess,time)
                              values (NULL,'".$_POST['play_room']."','$c','".time()."')");
$id = mysqli_insert_id($connID);                              //获取INSERT操作产生的ID号
if($id){      //如果id的逻辑值为真
    header("location:join.php?roomid=".$id);               //进入房间
    setcookie("message","中国网络象棋游戏欢迎您的加盟，游戏房间创建成功！");         //弹出提示信息
}
?>