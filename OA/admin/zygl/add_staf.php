<?php
header ( "Content-type: text/html; charset=gb2312" ); //设置文件编码格式
include "../inc/check.php";
include "../conn/conn.php";
?>
<script src="../js/admin_js.js"></script>
<script src="../js/riq.js"></script>
<script src="../../js/laydate/laydate.js"></script>
<link href="../css/style.css" rel="stylesheet">
<table width="765" height="450" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #9CBED6; margin-top:15px;">
<tr><td align="center" valign="middle">
<form name="add_staf" id="add_staf" method="post" action="add_staf_chk.php">
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" height="25" align="right" valign="middle" scope="col"><span class="STYLE1">*</span>员工账号：</td>
    <td width="150" height="25" align="left" valign="middle" scope="col"><input name="u_user" type="text" size="10" /></td>
    <td width="100" height="25" align="right" valign="middle" scope="col"><span class="STYLE1">*</span>姓名：</td>
    <td width="300" height="25" align="left" valign="middle" scope="col"><input type="text" name="u_name" size="15" /></td>
  </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle"><span class="STYLE1">*</span>密码：</td>
    <td width="150" height="25" align="left" valign="middle"><input type="password" name="u_pwd" size="10" /></td>
    <td width="100" height="25" align="right" valign="middle">性别：</td>
    <td width="300" align="left" valign="middle"><select name="u_sex"><option value="男">男</option><option value="女">女</option></select></td>
  </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle"><span class="STYLE1">*</span>部门：</td>
    <td width="150" height="25" align="left" valign="middle">
	<select name="u_depart">
	<?php
		$sqlstr = "select * from tb_depart where up_depart != 0 group by up_depart";
		$result = sqlsrv_query($conn,$sqlstr);
		$i = 0;
		while($rows = sqlsrv_fetch_array($result,SQLSRV_FETCH_NUMERIC)){
			$d_id[$i] = $rows[2];
			$i++;
		}
		$sqlstr1 = "select id,d_name from tb_depart where id != 0 ";
		$name = "";
		for($j = 0; $j < count($d_id); $j++){
			$sqlstr1 = $sqlstr1." and id != ".$d_id[$j];
		}
        $result1 = sqlsrv_query($conn,$sqlstr1);
		while($rows1 = sqlsrv_fetch_array($result1,SQLSRV_FETCH_NUMERIC)){
			echo "<option value=".$rows1[0].">".$rows1[1]."</option>";
		}
	?>	
	</select></td>
    <td width="100" height="25" align="right" valign="middle">出生日期：</td>
    <td width="300" height="25" align="left" valign="middle">
        <input name="u_birth" placeholder="请输入日期" class="laydate-icon" onclick="laydate()">
    </td>
  </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle"><span class="STYLE1">*</span>工作组：</td>
    <td width="150" height="25" align="left" valign="middle">
	<select name="u_group">
	<?php
		$sqlstr = "select id,u_group from tb_group";
		$result = sqlsrv_query($conn,$sqlstr);
		while($rows = sqlsrv_fetch_array($result,SQLSRV_FETCH_NUMERIC)){
			echo "<option value=".$rows[0].">".$rows[1]."</option>";
		}

	?>
	</select>	</td>
    <td width="100" height="25" align="right" valign="middle">员工电话：</td>
    <td width="300" align="left" valign="middle"><input type="text" name="u_tel" size="15" /></td>
  </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle">E-mail：</td>
    <td width="150" height="25" align="left" valign="middle"><input type="text" name="u_email" size="15" /></td>
    <td width="100" height="25" align="right" valign="middle">地址：</td>
    <td width="300" height="25" align="left" valign="middle"><input type="text" name="u_address" size="40" /></td>
  </tr>
  <tr>
    <td height="25" colspan="4" align="center" valign="middle">
	<input type="submit" value="添加" onclick="return add_check();" /><input type="reset" value="重置" />	</td>
    </tr>
</table>
</form></td></tr>
</table>