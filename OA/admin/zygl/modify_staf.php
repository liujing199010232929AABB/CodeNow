<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include "../inc/check.php";
include "../conn/conn.php";
$t_sqlstr = "select * from tb_users where id = ".$_GET['id'];
$t_result = sqlsrv_query($conn,$t_sqlstr);
$t_rows   = sqlsrv_fetch_array($t_result,SQLSRV_FETCH_NUMERIC);
?>
<script src="../js/admin_js.js" language="javascript"></script>
<script src="../js/riq.js" language="javascript"></script>
<script src="../../js/laydate/laydate.js"></script>
<link href="../css/style.css" rel="stylesheet">
<table width="765" height="450" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #9CBED6; margin-top:15px;">
<tr><td align="center" valign="middle">
<form name="mod_staf" id="mod_staf" method="post" action="modify_staf_chk.php">
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" height="25" align="right" valign="middle" scope="col"><span class="STYLE1">*</span>Ա���˺ţ�</td>
    <td width="150" height="25" align="left" valign="middle" scope="col"><input name="u_user" type="text" size="10" value="<?php echo $t_rows[1]; ?>" /></td>
    <td width="100" height="25" align="right" valign="middle" scope="col"><span class="STYLE1">*</span>������</td>
    <td width="300" height="25" align="left" valign="middle" scope="col"><input type="text" name="u_name" size="15" value="<?php echo $t_rows[3]; ?>" /></td>
  </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle">�Ա�</td>
    <td width="150" height="25" align="left" valign="middle"><select name="u_sex">
      <?php
		if($t_rows[4] == "��"){
	?>
      <option value="��" selected="selected">��</option>
      <option value="Ů">Ů</option>
      <?php
		}else{
	?>
      <option value="��">��</option>
      <option value="Ů" selected="selected">Ů</option>
      </select>
      <?php
		}
	?></td>
    <td width="100" height="25" align="right" valign="middle">�������ڣ�</td>
    <td width="300" align="left" valign="middle">
        <input name="u_birth" placeholder="����������" class="laydate-icon" onclick="laydate()" value="<?php echo $t_rows[5]; ?>">
    </td>
  </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle"><span class="STYLE1">*</span>���ţ�</td>
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
			if($t_rows[9] == $rows1[0])
				echo "<option value=".$rows1[0]." selected>".$rows1[1]."</option>";
			else
				echo "<option value=".$rows1[0]." >".$rows1[1]."</option>";
		}
	?>	
	</select></td>
    <td width="100" height="25" align="right" valign="middle">Ա���绰��</td>
    <td width="300" height="25" align="left" valign="middle"><input type="text" name="u_tel" size="15" value="<?php echo $t_rows[7]; ?>"  /></td>
  </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle">E-mail��</td>
    <td width="150" height="25" align="left" valign="middle"><input type="text" name="u_email" size="15" value="<?php echo $t_rows[8]; ?>"></td>
    <td width="100" height="25" align="right" valign="middle">��ַ��</td>
    <td width="300" align="left" valign="middle"><input type="text" name="u_address" size="40" value="<?php echo $t_rows[6]; ?>" /></td>
  </tr>
  <tr>
    <td height="25" colspan="4" align="center" valign="middle">
	<input type="hidden" name="id" value="<?php echo $t_rows[0]; ?>">
	<input type="submit" value="�޸�" onclick="return mod_check();" /><input type="reset" value="����" />	</td>
    </tr>
</table>
</form>
</td></tr></table>