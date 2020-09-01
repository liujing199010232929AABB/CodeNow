<?php
session_start();
include("bak_config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<title>无标题文档</title>
</head>
<body>
<script language="javascript">
function del_chk(){
	if(!confirm('确认要删除吗？')){
		return false;
	}else{
		return true;
	}
}
function re_bak(){
	if(!confirm('确认要恢复备份吗？')){
		return false;
	}else{
		return true;
	}
}
</script>
<div id="con_right">
  <div class="right_con">
    <div class="right_con_bt">·<?php echo $_GET['big_type']; ?> < <?php echo $_GET['small_type']; ?></div>

    <DIV style="padding-top:6px;">

   <table width="734" border="0" cellpadding="0" cellspacing="0">
<?php
if($_GET['small_type']=="数据库备份"){
?>
<form name="bak" id="bak" method="post" action="bak_chk.php">
  <tr height="30">
    <td align="right">数据备份：</td>
    <td><input type="text" name="b_name" class="input1" value="<?php echo date("YmdHis"); ?>.sql" readonly size="25" /></td>
    <td><input name="submit" type="submit" id="submit" value="备份数据" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
</form>
<?php
}else if($_GET['small_type']=="数据库恢复"){

?>
    <tr height="30">
        <td colspan="2" align="center">恢复数据：</td>
    </tr>
    <?php
        $data = show_file(PATH.ROOT.ADMIN.BAK);
        for($i=0;$i<count($data);$i++){
            if($data[$i] != '.' && $data[$i] != '..'){
    ?>
    <tr height="30">
        <td>
            &nbsp;&nbsp;<?php echo $data[$i]?>
        </td>
        <td align="right">
            <a href="rebak_chk.php?r_name=<?echo $data[$i]?>">恢复
        </td>
    </tr>
            <?php }?>
        <?php }?>
<?php
}else if($_GET['small_type']=="删除旧备份"){
?>
    <form name="bak" id="del_bak" method="post" action="del_bak.php">
        <tr height="30">
            <td align="right">删除备份：</td>
            <td><input name="submit" type="submit" id="delsubmit" value="删除备份" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
    </form>
<?php
}
?>
</table>

     </DIV>
    <br />
   </div>
</div>
</body>
</html>