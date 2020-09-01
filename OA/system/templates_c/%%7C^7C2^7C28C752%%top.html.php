<?php /* Smarty version 2.6.19, created on 2016-10-22 11:47:58
         compiled from top.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'top.html', 27, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/style.css" rel="stylesheet" />
<body>

<table style="width:100%;  background:url(images/bg_02.jpg)  no-repeat 0 -12px" >
    <tr >
        <td width="80%" height="70">&nbsp;</td>
        <td height="29" align="center"><a style="color:#ffffff;" href="pub_main.php" target="_parent">首页</a></td>
        <td height="21" align="center"><a style="color:#ffffff;" href="index.php" target="_parent">重新登录</a></td>
        <td height="21" align="center"><a style="color:#ffffff;" href="logout.php" target="_parent">退出</a></td>
        <td height="21">&nbsp;</td>
    </tr>
    <!--<tr>-->
        <!--<td width="55" height="57" align="center" valign="middle">&nbsp;</td>-->
        <!--<td width="102" align="center" valign="middle">&nbsp;</td>-->
        <!--<td width="52" align="center" valign="middle">&nbsp;</td>-->
        <!--<td width="14" align="center" valign="middle">&nbsp;</td>-->
    <!--</tr>-->
    <tr>
        <td width="1">&nbsp;</td>
        <td width="1" align="left" valign="middle"><font color="#f0f0f0"><?php echo $_SESSION['u_name']; ?>
</font></td>
        <td width="1" align="left" valign="middle"><font color="#f0f0f0"><?php echo $_SESSION['u_depart']; ?>
</font></td>
        <td width="1" height="20" align="center" valign="middle"><b><font color="#f0f0f0">
            <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
</font></b></td>
        <td width="1">&nbsp;</td>
    </tr>
</table>
</body>
</html>
