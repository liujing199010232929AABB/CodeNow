<?php
include "../inc/check.php"; //包含权限检查文件
include "../conn/conn.php"; //包含数据库链接文件
include "../inc/func.php";  //包含自定义函数文件
?>
<html>
<head>
<title>树状导航菜单</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<!--引入JS脚本文件-->
<script src="../js/admin_js.js"></script>
<!--引入外部CSS样式-->
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<!--查看部门信息-->
<table width="765" height="450" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #9CBED6; margin-top:15px;">
    <tr>
        <td align="center" valign="top" bgcolor="#DAE9EC">
            <table width="50%" height="25"  border="0" cellpadding="0" cellspacing="0">
                    <?php
                    //找到根部门
                    $sqlstr = "select * from tb_depart where top_depart = 0";
                    $result = sqlsrv_query($conn, $sqlstr);
                    //隐藏域id号
                    $m = 1;
                    //循环输出所有根部门
                    while($rows = sqlsrv_fetch_array($result,SQLSRV_FETCH_NUMERIC)){
                        $wid = 300;
                        //查看下属部门
                        $sqlstr1 = "select * from tb_depart where up_depart = ".$rows[0];
                        $result1 = sqlsrv_query($conn,$sqlstr1);
                        $nu      = sqlsrv_has_rows ($result1);
                        //如果当前部门没有下属部门时
                        if(!$nu){
                    ?>
                    <tr>
                        <td height="25">
                            <a href="#">
                                <img src="../Images/folder.gif" alt="展开" name="img<?php echo $m; ?>" width="30" height="16" border="0" id="img<?php echo $m; ?>">&nbsp;<?php echo $rows[1]; ?>
                            </a>
                            ------------------
                            <a href="edit_depart.php?id=<?php echo $rows[0]; ?>">修改</a>||
                            <a href="del_depart_chk.php?id=<?php echo $rows[0] ?>" onClick="return cfm();">删除</a>
                        </td>
                    </tr>
                        <?php
                        //如果当前部门有下属部门时
                        }else{
                        ?>
                    <tr>
                        <td height="25">
                            <a href="Javascript:ShowTR(img<?php echo $m; ?>,OpenRep<?php echo $m; ?>)">
                                <img src="../Images/jia.gif" alt="展开" name="img<?php echo $m; ?>" width="32" height="14" border="0" id="img<?php echo $m; ?>">&nbsp;
                                <?php echo $rows[1]; ?></a>
                            ------------------
                            <a href="edit_depart.php?id=<?php echo $rows[0]; ?>">修改</a>||删除
                        </td>
                    </tr>
                    <?php
                        //输出同级部门
                        list_menu($rows[0],$wid,$m);
                            $m += 1;
                        }
                    }
                    ?>
            </table>
        </td>
    </tr>
</table>
</body>
</html>