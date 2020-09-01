<?php /* Smarty version 2.6.19, created on 2016-10-20 10:54:53
         compiled from kqgl/set_time.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<link href="css/style.css" rel="stylesheet" />
<script src="js/client_js.js"></script>
<body>
<form name="form1" method="post" action="set_time_chk.php">
  <table border="0" cellspacing="0" cellpadding="0" background="images/bg.jpg">
    <tr>
      <td width="150" height="25" align="center" valign="middle">上班签到</td>
      <td width="150" height="25" align="center" valign="middle">下班签退</td>
      <td width="150" height="25" align="center" valign="middle">加班签到</td>
      <td width="150" height="25" align="center" valign="middle">加班签退</td>
    </tr>
    <tr>
    <?php unset($this->_sections['rec_id']);
$this->_sections['rec_id']['name'] = 'rec_id';
$this->_sections['rec_id']['loop'] = is_array($_loop=$this->_tpl_vars['rec']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rec_id']['show'] = true;
$this->_sections['rec_id']['max'] = $this->_sections['rec_id']['loop'];
$this->_sections['rec_id']['step'] = 1;
$this->_sections['rec_id']['start'] = $this->_sections['rec_id']['step'] > 0 ? 0 : $this->_sections['rec_id']['loop']-1;
if ($this->_sections['rec_id']['show']) {
    $this->_sections['rec_id']['total'] = $this->_sections['rec_id']['loop'];
    if ($this->_sections['rec_id']['total'] == 0)
        $this->_sections['rec_id']['show'] = false;
} else
    $this->_sections['rec_id']['total'] = 0;
if ($this->_sections['rec_id']['show']):

            for ($this->_sections['rec_id']['index'] = $this->_sections['rec_id']['start'], $this->_sections['rec_id']['iteration'] = 1;
                 $this->_sections['rec_id']['iteration'] <= $this->_sections['rec_id']['total'];
                 $this->_sections['rec_id']['index'] += $this->_sections['rec_id']['step'], $this->_sections['rec_id']['iteration']++):
$this->_sections['rec_id']['rownum'] = $this->_sections['rec_id']['iteration'];
$this->_sections['rec_id']['index_prev'] = $this->_sections['rec_id']['index'] - $this->_sections['rec_id']['step'];
$this->_sections['rec_id']['index_next'] = $this->_sections['rec_id']['index'] + $this->_sections['rec_id']['step'];
$this->_sections['rec_id']['first']      = ($this->_sections['rec_id']['iteration'] == 1);
$this->_sections['rec_id']['last']       = ($this->_sections['rec_id']['iteration'] == $this->_sections['rec_id']['total']);
?>
      <td height="30" align="center" valign="middle">
      <input type="text" name="l_time<?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['rec'][$this->_sections['rec_id']['index']]['l_time']; ?>
" size=15></td>

    <?php endfor; endif; ?>
      </tr>
    <tr>
      <td height="30" align="center" valign="middle"><input type="submit" name="u_logo" value="设置"></td>
      <td height="30" align="center" valign="middle"><input type="submit" name="d_logo" value="设置"></td>
      <td height="30" align="center" valign="middle"><input type="submit" name="a_logo" value="设置"></td>
      <td height="30" align="center" valign="middle"><input type="submit" name="q_logo" value="设置"></td>
    </tr>
  </table>
</form>
</body>
</html>