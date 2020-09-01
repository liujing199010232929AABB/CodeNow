<?php
    session_start();
    include "conn/conn.php";
    include "inc/func.php";
    //从tb_controller表筛选数据
    $sqlstr = "select * from tb_controller where manager = '".$_POST['username']."' and mana_pwd = '".$_POST['pwd']."'";
    $result = sqlsrv_query($conn,$sqlstr);                      //连接数据库
    $record = sqlsrv_fetch_array($result,SQLSRV_FETCH_NUMERIC); //执行查询
    if($record != "")
    {
        $_SESSION["m_id"] = $record[0];					    //管理员id
        $_SESSION["controller"] = $_POST['username'];		//管理员名称
        w_log($_POST['action'],$_SESSION['controller']);	//添加日志
        echo "<script>alert('登录成功');location='admin_main.php';</script>";
    }
    else
        echo "<script>alert('用户名或密码错误');history.go(-1);</script>";
    ?>

