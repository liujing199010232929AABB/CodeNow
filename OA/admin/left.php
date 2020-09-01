<?php
include "inc/check.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title></title>
    <link href="css/style.css" rel="stylesheet" />
</head>
<script src="js/admin_js.js" language="javascript"></script>
<script language=JavaScript>document.onclick = clickList;</script>
<body>
<table width="216"  border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td  height="533px" background="images/left.jpg" align="center" valign="top">
            <div id='div0' style="width:216px; position:relative">
                <div id='div0' class='active' style="cursor: hand; width:216px; height: 31px; text-align:center; ">部门管理</span></div>
            </div>

            <div id='div0other' style="display:None; width:216px">
                <div style=" width:216; height:24; padding-top:8px"><a href="bmgl/show_depart.php" target="mainFrame">
                        查看部门</a></div>
                <div style="width:216; height:24; padding-top:8px"><a href="bmgl/add_depart.php" target="mainFrame">添加部门</a></div>
            </div>
            <div id=div1 style="position:relative; width:216;">
                <div id=div1 class=active style="cursor: hand; width:216; height:31; text-align:center; ">职员管理</div>
            </div>
            <div id=div1other style="display:None; position:relative; width:216;">
                <div style=" width:216; height:24; padding-top:8px"><a href="zygl/show_staf.php" target="mainFrame">查看职员</a></div>
                <div style=" width:216; height:24; padding-top:8px"><a href="zygl/add_staf.php" target="mainFrame">添加职员</a></div>
            </div>
            <div id=div2 style="position:relative; width:216;">
                <div id=div2 class=active style="cursor: hand;  width:216; height:31; text-align:center; ">权限管理</div>
            </div>
            <div id=div2other style="display:None; position:relative; width:216;">
                <div style="width:216; height:24; padding-top:8px"><a href="qxgl/accounts_purview.php" target="mainFrame" >账号权限</a></div>
                <div style="width:216; height:24; padding-top:8px"><a href="qxgl/user_group.php" target="mainFrame">用户组设置</a></div>
                <div style="width:216; height:24; padding-top:8px"><a href="qxgl/pur_assign.php" target="mainFrame">权限分配</a></div>

            </div>
            <div id=div3 style="position:relative; width:216;">
                <div id=div3 class=active style="cursor: hand;  width:216; height:31; text-align:center; ">系统管理</div>
            </div>
            <div id=div3other style="display:None; position:relative; widows:216;">
                <div style=" width:216; height:24; padding-top:8px"><a href="xtgl/slog.php" target="mainFrame">系统日志</a></div>
                <div style=" width:216; height:24; padding-top:8px"><a href="xtgl/modify_pwd.php" target="mainFrame">修改密码</a></div>
            </div>
        </td>
    </tr>
</table>

</body>
</html>

