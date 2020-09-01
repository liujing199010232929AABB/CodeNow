<?php /* Smarty version 2.6.19, created on 2016-09-27 10:42:14
         compiled from statistics.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'statistics.phtml', 47, false),array('function', 'math', 'statistics.phtml', 47, false),)), $this); ?>
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/reset.css" rel="stylesheet" type="text/css" />
<div id="con_right">
  <div class="right_con">
    <div class="right_con_bt">·<?php echo $_GET['big_type']; ?>
 < <?php echo $_GET['small_type']; ?>
</div>
    <br />
    <br />
    <br />
    <DIV class="right_con_form">
    <form name="form_statistics" method="post" action="">
    <div style="width:100%; text-align:left; padding-top:5px; padding-left:50px">
        请选择工种（不填写为统计全部）：<select name="pro_class" id="pro_class" class="input1">
        <option value=0>请选择</option>
        <?php echo $this->_tpl_vars['displayType']; ?>

    </select>

        <br />
        <br />
        <input type="submit" name="submit" value="统计题型"/>
    </div>
    </form>
    <?php if ($this->_tpl_vars['isshow'] == 'F'): ?>
        <?php if ($this->_tpl_vars['bcjyzs']['data'] != false): ?>
        <DIV style="padding-left:6px;">
            <UL>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 6%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">序号</LI>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 42%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">所属类别</LI>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 31%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">题型</LI>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 25px; border-bottom:#21de26 1px solid;">题目数量</LI>
            </UL>
        </DIV>
        <?php unset($this->_sections['tnid']);
$this->_sections['tnid']['name'] = 'tnid';
$this->_sections['tnid']['loop'] = is_array($_loop=$this->_tpl_vars['bcjyzs']['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tnid']['show'] = true;
$this->_sections['tnid']['max'] = $this->_sections['tnid']['loop'];
$this->_sections['tnid']['step'] = 1;
$this->_sections['tnid']['start'] = $this->_sections['tnid']['step'] > 0 ? 0 : $this->_sections['tnid']['loop']-1;
if ($this->_sections['tnid']['show']) {
    $this->_sections['tnid']['total'] = $this->_sections['tnid']['loop'];
    if ($this->_sections['tnid']['total'] == 0)
        $this->_sections['tnid']['show'] = false;
} else
    $this->_sections['tnid']['total'] = 0;
if ($this->_sections['tnid']['show']):

            for ($this->_sections['tnid']['index'] = $this->_sections['tnid']['start'], $this->_sections['tnid']['iteration'] = 1;
                 $this->_sections['tnid']['iteration'] <= $this->_sections['tnid']['total'];
                 $this->_sections['tnid']['index'] += $this->_sections['tnid']['step'], $this->_sections['tnid']['iteration']++):
$this->_sections['tnid']['rownum'] = $this->_sections['tnid']['iteration'];
$this->_sections['tnid']['index_prev'] = $this->_sections['tnid']['index'] - $this->_sections['tnid']['step'];
$this->_sections['tnid']['index_next'] = $this->_sections['tnid']['index'] + $this->_sections['tnid']['step'];
$this->_sections['tnid']['first']      = ($this->_sections['tnid']['iteration'] == 1);
$this->_sections['tnid']['last']       = ($this->_sections['tnid']['iteration'] == $this->_sections['tnid']['total']);
?>
        <DIV style="padding-left:6px;">
            <UL>

                <LI style="LINE-HEIGHT: 23px; WIDTH: 6%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['i']; ?>
</LI>
                <LI style="LINE-HEIGHT: 23px; WIDTH: 42%; FLOAT: left; text-align:center;padding-left:10px; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['tnid']['index']]['typename']; ?>
</LI>
                <LI style="LINE-HEIGHT: 23px; WIDTH: 31%; FLOAT: left; text-align:center;padding-left:10px; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['tnid']['index']]['chinese']; ?>
</LI>
                <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 23px; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['tnid']['index']]['c']; ?>
</LI>
                <?php $this->assign('i', $this->_tpl_vars['i']+1); ?>

            </UL>
         </DIV>
        <?php endfor; endif; ?>
        <div style="padding-left:6px; padding-top:6px; padding-bottom:6px;">
            <div style="height:22px;  float:left">
                <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['bcjyzs']['countRs']; ?>
篇&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['bcjyzs']['pageSize']; ?>
篇&nbsp;&nbsp;第<?php echo $this->_tpl_vars['bcjyzs']['page']; ?>
页/共<?php echo $this->_tpl_vars['bcjyzs']['countPage']; ?>
页&nbsp;&nbsp;<a href="?page=<?php echo $this->_tpl_vars['bcjyzs']['first']; ?>
&i=1&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="?page=<?php echo $this->_tpl_vars['bcjyzs']['previous']; ?>
&i=<?php if ($this->_tpl_vars['bcjyzs']['page'] == 1): ?>1<?php else: ?><?php echo smarty_function_math(array('equation' => '(x-2)*y+1','x' => $this->_tpl_vars['bcjyzs']['page'],'y' => $this->_tpl_vars['bcjyzs']['pageSize']), $this);?>
<?php endif; ?>&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="?page=<?php echo $this->_tpl_vars['bcjyzs']['next']; ?>
&i=<?php if ($this->_tpl_vars['bcjyzs']['page'] == $this->_tpl_vars['bcjyzs']['countPage']): ?><?php echo smarty_function_math(array('equation' => '(x-1)*y+1','x' => $this->_tpl_vars['bcjyzs']['page'],'y' => $this->_tpl_vars['bcjyzs']['pageSize']), $this);?>
<?php else: ?><?php echo smarty_function_math(array('equation' => '(x*y)+1','x' => $this->_tpl_vars['bcjyzs']['pageSize'],'y' => $this->_tpl_vars['bcjyzs']['page']), $this);?>
<?php endif; ?>&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="?page=<?php echo $this->_tpl_vars['bcjyzs']['last']; ?>
&i=<?php echo smarty_function_math(array('equation' => '(x-1)*y+1','x' => $this->_tpl_vars['bcjyzs']['countPage'],'y' => $this->_tpl_vars['bcjyzs']['pageSize']), $this);?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">尾页</a></strong> </div>
                <?php unset($this->_sections['numId']);
$this->_sections['numId']['name'] = 'numId';
$this->_sections['numId']['loop'] = is_array($_loop=$this->_tpl_vars['bcjyzs']['arrayNum']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['numId']['show'] = true;
$this->_sections['numId']['max'] = $this->_sections['numId']['loop'];
$this->_sections['numId']['step'] = 1;
$this->_sections['numId']['start'] = $this->_sections['numId']['step'] > 0 ? 0 : $this->_sections['numId']['loop']-1;
if ($this->_sections['numId']['show']) {
    $this->_sections['numId']['total'] = $this->_sections['numId']['loop'];
    if ($this->_sections['numId']['total'] == 0)
        $this->_sections['numId']['show'] = false;
} else
    $this->_sections['numId']['total'] = 0;
if ($this->_sections['numId']['show']):

            for ($this->_sections['numId']['index'] = $this->_sections['numId']['start'], $this->_sections['numId']['iteration'] = 1;
                 $this->_sections['numId']['iteration'] <= $this->_sections['numId']['total'];
                 $this->_sections['numId']['index'] += $this->_sections['numId']['step'], $this->_sections['numId']['iteration']++):
$this->_sections['numId']['rownum'] = $this->_sections['numId']['iteration'];
$this->_sections['numId']['index_prev'] = $this->_sections['numId']['index'] - $this->_sections['numId']['step'];
$this->_sections['numId']['index_next'] = $this->_sections['numId']['index'] + $this->_sections['numId']['step'];
$this->_sections['numId']['first']      = ($this->_sections['numId']['iteration'] == 1);
$this->_sections['numId']['last']       = ($this->_sections['numId']['iteration'] == $this->_sections['numId']['total']);
?>
                <div style="width:3px; height:22px; float:left"></div>

                <div style="width:23px; height:22px; padding-left:5px; float:left; border:1px solid #AED4EB; padding-top:3px ;<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?> background-color:#51D26B <?php endif; ?> "> <a href="?page=<?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
&i=<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == 1): ?>1<?php else: ?><?php echo smarty_function_math(array('equation' => '(x-1)*y+1','x' => $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']],'y' => $this->_tpl_vars['bcjyzs']['pageSize']), $this);?>
<?php endif; ?>&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?><?php endif; ?></a> </div>
                <?php endfor; endif; ?> </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['isshow'] == 'T'): ?>
        <?php if ($this->_tpl_vars['exam_problem'] != false): ?>
        <DIV style="padding-left:6px;">
            <UL>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 6%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">序号</LI>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 42%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">所属类别</LI>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 31%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">题型</LI>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 25px; border-bottom:#21de26 1px solid;">题目数量</LI>
            </UL>
        </DIV>
        <?php $i = 1; ?>
        <?php unset($this->_sections['emid']);
$this->_sections['emid']['name'] = 'emid';
$this->_sections['emid']['loop'] = is_array($_loop=$this->_tpl_vars['emtypes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['emid']['show'] = true;
$this->_sections['emid']['max'] = $this->_sections['emid']['loop'];
$this->_sections['emid']['step'] = 1;
$this->_sections['emid']['start'] = $this->_sections['emid']['step'] > 0 ? 0 : $this->_sections['emid']['loop']-1;
if ($this->_sections['emid']['show']) {
    $this->_sections['emid']['total'] = $this->_sections['emid']['loop'];
    if ($this->_sections['emid']['total'] == 0)
        $this->_sections['emid']['show'] = false;
} else
    $this->_sections['emid']['total'] = 0;
if ($this->_sections['emid']['show']):

            for ($this->_sections['emid']['index'] = $this->_sections['emid']['start'], $this->_sections['emid']['iteration'] = 1;
                 $this->_sections['emid']['iteration'] <= $this->_sections['emid']['total'];
                 $this->_sections['emid']['index'] += $this->_sections['emid']['step'], $this->_sections['emid']['iteration']++):
$this->_sections['emid']['rownum'] = $this->_sections['emid']['iteration'];
$this->_sections['emid']['index_prev'] = $this->_sections['emid']['index'] - $this->_sections['emid']['step'];
$this->_sections['emid']['index_next'] = $this->_sections['emid']['index'] + $this->_sections['emid']['step'];
$this->_sections['emid']['first']      = ($this->_sections['emid']['iteration'] == 1);
$this->_sections['emid']['last']       = ($this->_sections['emid']['iteration'] == $this->_sections['emid']['total']);
?>
        <?php unset($this->_sections['tnid']);
$this->_sections['tnid']['name'] = 'tnid';
$this->_sections['tnid']['loop'] = is_array($_loop=$this->_tpl_vars['exam_problem']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tnid']['show'] = true;
$this->_sections['tnid']['max'] = $this->_sections['tnid']['loop'];
$this->_sections['tnid']['step'] = 1;
$this->_sections['tnid']['start'] = $this->_sections['tnid']['step'] > 0 ? 0 : $this->_sections['tnid']['loop']-1;
if ($this->_sections['tnid']['show']) {
    $this->_sections['tnid']['total'] = $this->_sections['tnid']['loop'];
    if ($this->_sections['tnid']['total'] == 0)
        $this->_sections['tnid']['show'] = false;
} else
    $this->_sections['tnid']['total'] = 0;
if ($this->_sections['tnid']['show']):

            for ($this->_sections['tnid']['index'] = $this->_sections['tnid']['start'], $this->_sections['tnid']['iteration'] = 1;
                 $this->_sections['tnid']['iteration'] <= $this->_sections['tnid']['total'];
                 $this->_sections['tnid']['index'] += $this->_sections['tnid']['step'], $this->_sections['tnid']['iteration']++):
$this->_sections['tnid']['rownum'] = $this->_sections['tnid']['iteration'];
$this->_sections['tnid']['index_prev'] = $this->_sections['tnid']['index'] - $this->_sections['tnid']['step'];
$this->_sections['tnid']['index_next'] = $this->_sections['tnid']['index'] + $this->_sections['tnid']['step'];
$this->_sections['tnid']['first']      = ($this->_sections['tnid']['iteration'] == 1);
$this->_sections['tnid']['last']       = ($this->_sections['tnid']['iteration'] == $this->_sections['tnid']['total']);
?>
        <?php if ($this->_tpl_vars['exam_problem'][$this->_sections['tnid']['index']]['pro_type'] == $this->_tpl_vars['emtypes'][$this->_sections['emid']['index']]['english']): ?>
        <DIV style="padding-left:6px;">
            <UL>
                <LI style="LINE-HEIGHT: 23px; WIDTH: 6%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $i  ?></LI>
                <LI style="LINE-HEIGHT: 23px; WIDTH: 42%; FLOAT: left; text-align:center;padding-left:10px; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['exam_problem'][$this->_sections['tnid']['index']]['typename']; ?>
</LI>
                <LI style="LINE-HEIGHT: 23px; WIDTH: 31%; FLOAT: left; text-align:center;padding-left:10px; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['exam_problem'][$this->_sections['tnid']['index']]['chinese']; ?>
</LI>
                <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 23px; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['exam_problem'][$this->_sections['tnid']['index']]['c']; ?>
</LI>
                <?php $i++; ?>
            </UL>
        </DIV>
        <?php endif; ?>
        <?php endfor; endif; ?>
        <?php endfor; endif; ?>
        <?php endif; ?>
    <?php endif; ?>
    </DIV>
    <BR>
  </div>
</div>