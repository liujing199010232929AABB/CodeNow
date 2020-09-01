<?php /* Smarty version 2.6.19, created on 2016-07-26 16:31:09
         compiled from left.html */ ?>
<script language="javascript" src="js/left.js"></script>
<link href="css/style.css" rel="stylesheet" />
<table width="203" height="505" border="0" cellpadding="0" cellspacing="0" background="images/left.jpg">
	<tr>
		<td align="center" valign="top">&nbsp;
			<?php $_from = $this->_tpl_vars['left']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
			<a href="javascript:;">
				<div id="s<?php echo $this->_tpl_vars['data']['id']; ?>
" style="width:150px; padding-top:5px; color:#FFFFFF; height:24px; background:url(images/jia.gif)" align="center" onclick="javascript:change(e<?php echo $this->_tpl_vars['data']['id']; ?>
,s<?php echo $this->_tpl_vars['data']['id']; ?>
)">
					<?php echo $this->_tpl_vars['data']['f_type']; ?>

				</div>
			</a>
			<div id="e<?php echo $this->_tpl_vars['data']['id']; ?>
" style="display:none;">
				<?php $_from = $this->_tpl_vars['data']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child_lists']):
?>
				<div>
					<a href="<?php echo $this->_tpl_vars['child_lists']['o_url']; ?>
?u_id=<?php echo $this->_tpl_vars['child_lists']['id']; ?>
" target="mainFrame">
						<?php echo $this->_tpl_vars['child_lists']['f_name']; ?>

					</a>
				</div>
				<?php endforeach; endif; unset($_from); ?>
			</div>
			<?php endforeach; endif; unset($_from); ?>
		</td>
	</tr>
	<tr>
		<td colspan="2" height="54" background="images/left_top.gif">&nbsp;</td>
	</tr>
</table>