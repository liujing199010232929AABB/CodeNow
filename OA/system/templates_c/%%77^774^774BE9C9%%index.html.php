<?php /* Smarty version 2.6.19, created on 2016-11-25 09:39:52
         compiled from index.html */ ?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>职员登录</title>

<script src="js/client_js.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body onload="document.login.username.focus();">

<form name="login" method="post" action="index_ok.php">
<table width="100%" height="620" border="0" cellpadding="0" cellspacing="0" background="images/bg_02.gif">
 	<tr>
		<td colspan="3" height="150">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td width="324" height="204" align="center" valign="middle">
		<table width="324" height="204" border="0" cellpadding="0" cellspacing="0" background="images/bg_03.jpg">
      		<tr>
        		<td height="65" colspan="2" align="center" valign="middle">&nbsp;</td>
       		</tr>
      		<tr>
      		  <td width="140" height="25" align="right" valign="middle"><span id="lg"><strong>用户名称：</strong></span></td>
   		      <td width="175" align="left" valign="middle">
				  <input name="username" type="text" class="STYLE1" id="username" size="15" /></td>
      		</tr>
      		<tr>
       			<td height="25" align="right" valign="middle"><span id="lg"><strong>用户密码：</strong></span></td>
      			<td align="left" valign="middle"><input name="pwd" type="password" id="pwd" size="15" /></td>
      		</tr>
	  		<tr>
				<td height="25" align="right" valign="middle">
                    <span id="lg"><strong>用户组：</strong></span>
                </td>
        		<td align="left" valign="middle">
				  <select name="u_group">
						<?php $_from = $this->_tpl_vars['gro']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gro']):
?>
						<option value="<?php echo $this->_tpl_vars['gro']['id']; ?>
"><?php echo $this->_tpl_vars['gro']['u_group']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</td>
	  		</tr>
      		<tr>
        		<td height="64" colspan="2" align="center" valign="middle">
				  <strong>
					<input type="hidden" name="action" value="login" />
					<input type="submit" name="login" id="login" value="登录" onclick="return chk_lg();"/>
					&nbsp;&nbsp;&nbsp;
					<input type="reset" name="reset" id="reset" value="重置" />
			      </strong></td>
      		</tr>
    	</table>
	</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" height="155">&nbsp;</td>
	</tr>
 </table>
    
  </form>
</body>
</html>