<?php /* Smarty version 2.6.19, created on 2013-10-22 17:18:41
         compiled from searchmockfraction.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'searchmockfraction.phtml', 26, false),array('modifier', 'escape', 'searchmockfraction.phtml', 59, false),)), $this); ?>
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/reset.css" rel="stylesheet" type="text/css" />
<!--右侧-->
<div id="con_right">
    <div class="right_con">
        <div class="right_con_bt">·<?php echo $_GET['big_type']; ?>
 < <?php echo $_GET['small_type']; ?>
</div>
        <div class="right_con_bt" style=" height:53px; padding-top:4px; padding-bottom:4px; alignpadding-left:6px; "><span style="padding-left: 20px">员工成绩查询：</span><span style="padding-left: 500px"><a href="exportexcel.php">导出成绩表</a></span>
            <form id="form1" name="form1" method="post" action="">
                <ul style="margin-left: 20px">
                <li>
                姓名：
                <input name="name" type="text" size="10" value=""/>

                所属类别：
                <select name="pro_class" id="pro_class" class="input1" >
                    <option value="">请选择</option>
                    <?php echo $this->_tpl_vars['displayType']; ?>

                </select>
                 </li>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li>

                考试名称：
                <select name="examid" id="examid" class="input1">
                    <option value="">请选择</option>
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['titles'],'selected' => $this->_tpl_vars['examsid']), $this);?>

                </select>
                    </li>
                <br />
                <input type="submit" value="提交" name="submit">
<!--                    <input name="no" type="hidden" value="60" />-->
<!--                    <input name="no_submit" type="submit" id="no_submit" value="查询不及格者">-->
            </form>

        </div>
        <br />
        <br />
        <br />
        <DIV>
            <?php if ($this->_tpl_vars['search'] != 't'): ?>
            <DIV style="padding-left:6px;">
                <UL>
                    <LI style="LINE-HEIGHT: 25px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">准考证号</LI>
                    <LI style="LINE-HEIGHT: 25px; WIDTH: 16%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">考试名称 </LI>
                    <LI style="LINE-HEIGHT: 25px; WIDTH: 16%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">姓名</LI>
                    <LI style="LINE-HEIGHT: 25px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">身份证号</LI>
                    <LI style="LINE-HEIGHT: 25px; WIDTH: 15%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">得分</LI>
                    <LI style="LINE-HEIGHT: 25px; WIDTH: 15%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">查看</LI>
                </UL>
            </DIV>
            <?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['bcjyzs']['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
            <DIV style="padding-left:6px;">
                <UL>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; padding-left:10px; FLOAT: left; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['admission']; ?>
</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 16%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;overflow: hidden;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['title']; ?>
 </LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 16%; padding-left:10px; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['name']; ?>
</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['ID_number']; ?>
 </LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 15%; padding-left:10px; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['fraction']; ?>
</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 15%; padding-left:10px; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><a href="?edit=t&id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['meid']; ?>
&examination_id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['examination_id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">查阅试卷</a></LI>
                </UL>
            </DIV>
            <?php endfor; endif; ?>
            <?php endif; ?>
        </DIV>
        <br />
        <br />
        <br />
        <?php if ($this->_tpl_vars['search'] == 't'): ?>

        <DIV style="padding-left:6px;">
            <UL>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-top:#21de26 1px solid; border-bottom:#21de26 1px solid;">准考证号</LI>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 16%; FLOAT: left; padding-left:6px; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-top:#21de26 1px solid; border-bottom:#21de26 1px solid;">考试名称</LI>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 16%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-top:#21de26 1px solid; border-bottom:#21de26 1px solid;">姓名</LI>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-top:#21de26 1px solid; border-bottom:#21de26 1px solid;">身份证号</LI>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 15%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-top:#21de26 1px solid; border-bottom:#21de26 1px solid;">得分</LI>
                <LI style="LINE-HEIGHT: 25px; WIDTH: 15%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-top:#21de26 1px solid; border-bottom:#21de26 1px solid;">查看</LI>
            </UL>
        </DIV>

        <?php unset($this->_sections['sea_id']);
$this->_sections['sea_id']['name'] = 'sea_id';
$this->_sections['sea_id']['loop'] = is_array($_loop=$this->_tpl_vars['search_res']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sea_id']['show'] = true;
$this->_sections['sea_id']['max'] = $this->_sections['sea_id']['loop'];
$this->_sections['sea_id']['step'] = 1;
$this->_sections['sea_id']['start'] = $this->_sections['sea_id']['step'] > 0 ? 0 : $this->_sections['sea_id']['loop']-1;
if ($this->_sections['sea_id']['show']) {
    $this->_sections['sea_id']['total'] = $this->_sections['sea_id']['loop'];
    if ($this->_sections['sea_id']['total'] == 0)
        $this->_sections['sea_id']['show'] = false;
} else
    $this->_sections['sea_id']['total'] = 0;
if ($this->_sections['sea_id']['show']):

            for ($this->_sections['sea_id']['index'] = $this->_sections['sea_id']['start'], $this->_sections['sea_id']['iteration'] = 1;
                 $this->_sections['sea_id']['iteration'] <= $this->_sections['sea_id']['total'];
                 $this->_sections['sea_id']['index'] += $this->_sections['sea_id']['step'], $this->_sections['sea_id']['iteration']++):
$this->_sections['sea_id']['rownum'] = $this->_sections['sea_id']['iteration'];
$this->_sections['sea_id']['index_prev'] = $this->_sections['sea_id']['index'] - $this->_sections['sea_id']['step'];
$this->_sections['sea_id']['index_next'] = $this->_sections['sea_id']['index'] + $this->_sections['sea_id']['step'];
$this->_sections['sea_id']['first']      = ($this->_sections['sea_id']['iteration'] == 1);
$this->_sections['sea_id']['last']       = ($this->_sections['sea_id']['iteration'] == $this->_sections['sea_id']['total']);
?>
        <DIV style="padding-left:6px;">
            <UL>
                <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; padding-left:10px; FLOAT: left; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['search_res'][$this->_sections['sea_id']['index']]['admission']; ?>
</LI>
                <LI style="LINE-HEIGHT: 23px; WIDTH: 16%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;overflow: hidden;"><?php echo $this->_tpl_vars['search_res'][$this->_sections['sea_id']['index']]['title']; ?>
</LI>
                <LI style="LINE-HEIGHT: 23px; WIDTH: 16%; padding-left:10px; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['search_res'][$this->_sections['sea_id']['index']]['name']; ?>
</LI>
                <LI style="LINE-HEIGHT: 23px; WIDTH: 18%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['search_res'][$this->_sections['sea_id']['index']]['ID_number']; ?>
</LI>
                <LI style="LINE-HEIGHT: 23px; WIDTH: 15%; padding-left:10px; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['search_res'][$this->_sections['sea_id']['index']]['fraction']; ?>
</LI>
                <LI style="LINE-HEIGHT: 23px; WIDTH: 15%; padding-left:10px; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><a href="?edit=t&id=<?php echo $this->_tpl_vars['search_res'][$this->_sections['sea_id']['index']]['meid']; ?>
&examination_id=<?php echo $this->_tpl_vars['search_res'][$this->_sections['sea_id']['index']]['examination_id']; ?>
&search=t&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">查阅试卷</a></LI>
            </UL>
        </DIV>
        <?php endfor; endif; ?>
        <DIV style=" float:left; padding-left:480px; padding-top:10px;">符合查询条件的记录：<?php echo $this->_tpl_vars['search_count']; ?>
条</DIV>
        <?php endif; ?> </DIV>
    <br />
    <br />
    <br />
    <?php if ($this->_tpl_vars['search'] != 't'): ?>
    <div style="padding-left:6px; padding-top:6px;"> <?php if ($this->_tpl_vars['bcjyzs']['data'] != false): ?>
        <div style="height:22px;  float:left">
            <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['bcjyzs']['countRs']; ?>
篇&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['bcjyzs']['pageSize']; ?>
篇&nbsp;&nbsp;第<?php echo $this->_tpl_vars['bcjyzs']['page']; ?>
页/共<?php echo $this->_tpl_vars['bcjyzs']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/searchmockfraction.php?page=<?php echo $this->_tpl_vars['bcjyzs']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/searchmockfraction.php?page=<?php echo $this->_tpl_vars['bcjyzs']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/searchmockfraction.php?page=<?php echo $this->_tpl_vars['bcjyzs']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/searchmockfraction.php?page=<?php echo $this->_tpl_vars['bcjyzs']['last']; ?>
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
            <div style="width:23px; height:22px; padding-left:5px; float:left; border:1px solid #AED4EB; padding-top:3px ;<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?> background-color:#51D26B <?php endif; ?> "> <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/searchmockfraction.php?page=<?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?><?php endif; ?></a> </div>
            <?php endfor; endif; ?>
        </div>
        <?php endif; ?> </div>

    <?php endif; ?>
    <?php if ($this->_tpl_vars['edit'] == 't'): ?>
    <div class="sub_c">
        <div class="sub_c_bt" style="padding-top:12px; color:#000000; line-height:20px; font-size:14px; font-weight:bold; text-align:center;"><?php echo $this->_tpl_vars['title']; ?>
 <br />
            <span style=" color:#ff6101; font-weight:normal; padding-right:30px; font-size:12px; float:right;" >姓名：<?php echo $this->_tpl_vars['name']; ?>
 &nbsp;&nbsp;&nbsp;&nbsp;类型：<?php echo $this->_tpl_vars['pro_class']; ?>
 &nbsp;&nbsp;&nbsp;&nbsp;成绩：<?php echo $this->_tpl_vars['fraction']; ?>
 分&nbsp;&nbsp;&nbsp;&nbsp; </span> </div>
        <div class="k_con">
            <ul>
                <li>
                    <p> <?php $i=0; ?>
                        <?php $_from = $this->_tpl_vars['pro_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type_id']):
?>

                        <?php if ($this->_tpl_vars['type_id'] == 'radio'): ?>
                <li> <span style="width:100%; float:left; padding-left:10px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 一、 单选题（选择一个正确答案字母）每题<?php echo $this->_tpl_vars['radioFraction']; ?>
分，共<?php echo $this->_tpl_vars['Radios']; ?>
题</span><a name="radio"></a> </li><br>
                <?php unset($this->_sections['rad_id']);
$this->_sections['rad_id']['name'] = 'rad_id';
$this->_sections['rad_id']['loop'] = is_array($_loop=$this->_tpl_vars['examination']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rad_id']['show'] = true;
$this->_sections['rad_id']['max'] = $this->_sections['rad_id']['loop'];
$this->_sections['rad_id']['step'] = 1;
$this->_sections['rad_id']['start'] = $this->_sections['rad_id']['step'] > 0 ? 0 : $this->_sections['rad_id']['loop']-1;
if ($this->_sections['rad_id']['show']) {
    $this->_sections['rad_id']['total'] = $this->_sections['rad_id']['loop'];
    if ($this->_sections['rad_id']['total'] == 0)
        $this->_sections['rad_id']['show'] = false;
} else
    $this->_sections['rad_id']['total'] = 0;
if ($this->_sections['rad_id']['show']):

            for ($this->_sections['rad_id']['index'] = $this->_sections['rad_id']['start'], $this->_sections['rad_id']['iteration'] = 1;
                 $this->_sections['rad_id']['iteration'] <= $this->_sections['rad_id']['total'];
                 $this->_sections['rad_id']['index'] += $this->_sections['rad_id']['step'], $this->_sections['rad_id']['iteration']++):
$this->_sections['rad_id']['rownum'] = $this->_sections['rad_id']['iteration'];
$this->_sections['rad_id']['index_prev'] = $this->_sections['rad_id']['index'] - $this->_sections['rad_id']['step'];
$this->_sections['rad_id']['index_next'] = $this->_sections['rad_id']['index'] + $this->_sections['rad_id']['step'];
$this->_sections['rad_id']['first']      = ($this->_sections['rad_id']['iteration'] == 1);
$this->_sections['rad_id']['last']       = ($this->_sections['rad_id']['iteration'] == $this->_sections['rad_id']['total']);
?>
                <?php unset($this->_sections['exam_id']);
$this->_sections['exam_id']['name'] = 'exam_id';
$this->_sections['exam_id']['loop'] = is_array($_loop=$this->_tpl_vars['tb_exam']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exam_id']['show'] = true;
$this->_sections['exam_id']['max'] = $this->_sections['exam_id']['loop'];
$this->_sections['exam_id']['step'] = 1;
$this->_sections['exam_id']['start'] = $this->_sections['exam_id']['step'] > 0 ? 0 : $this->_sections['exam_id']['loop']-1;
if ($this->_sections['exam_id']['show']) {
    $this->_sections['exam_id']['total'] = $this->_sections['exam_id']['loop'];
    if ($this->_sections['exam_id']['total'] == 0)
        $this->_sections['exam_id']['show'] = false;
} else
    $this->_sections['exam_id']['total'] = 0;
if ($this->_sections['exam_id']['show']):

            for ($this->_sections['exam_id']['index'] = $this->_sections['exam_id']['start'], $this->_sections['exam_id']['iteration'] = 1;
                 $this->_sections['exam_id']['iteration'] <= $this->_sections['exam_id']['total'];
                 $this->_sections['exam_id']['index'] += $this->_sections['exam_id']['step'], $this->_sections['exam_id']['iteration']++):
$this->_sections['exam_id']['rownum'] = $this->_sections['exam_id']['iteration'];
$this->_sections['exam_id']['index_prev'] = $this->_sections['exam_id']['index'] - $this->_sections['exam_id']['step'];
$this->_sections['exam_id']['index_next'] = $this->_sections['exam_id']['index'] + $this->_sections['exam_id']['step'];
$this->_sections['exam_id']['first']      = ($this->_sections['exam_id']['iteration'] == 1);
$this->_sections['exam_id']['last']       = ($this->_sections['exam_id']['iteration'] == $this->_sections['exam_id']['total']);
?>
                <?php if ($this->_tpl_vars['examination'][$this->_sections['rad_id']['index']]['0'] == $this->_tpl_vars['tb_exam'][$this->_sections['exam_id']['index']]['id'] && $this->_tpl_vars['examination'][$this->_sections['rad_id']['index']]['1'] == $this->_tpl_vars['type_id']): ?>
                <li> <span class="kt"> <span class="kt_t"> <?php 
            $i++;
            echo $i;
            echo "<a name=" .$i. "></a>";

             ?>、
            <?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id']['index']]['content']; ?>
</span> </span><br>
                    <span class="kt_a"> 正确答案：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id']['index']]['answer']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;您的答案：<?php echo $this->_tpl_vars['examination'][$this->_sections['rad_id']['index']]['3']; ?>
 </span> <?php if ($this->_tpl_vars['tb_exam'][$this->_sections['exam_id']['index']]['resolve'] != ""): ?> <span class="kt_a"> 问题解析：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id']['index']]['resolve']; ?>
 </span> <?php endif; ?> </li>
                <?php endif; ?>
                <?php endfor; endif; ?>

                <?php endfor; endif; ?>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['type_id'] == 'checkbox'): ?>
                <li> <span style="width:100%; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 二、 多选题（选择两个或两个以上正确答案字母）每题<?php echo $this->_tpl_vars['checkboxFraction']; ?>
分，共<?php echo $this->_tpl_vars['Checkboxs']; ?>
题</span><a name="checkbox"></a> </li>
                <?php unset($this->_sections['rad_id1']);
$this->_sections['rad_id1']['name'] = 'rad_id1';
$this->_sections['rad_id1']['loop'] = is_array($_loop=$this->_tpl_vars['examination']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rad_id1']['show'] = true;
$this->_sections['rad_id1']['max'] = $this->_sections['rad_id1']['loop'];
$this->_sections['rad_id1']['step'] = 1;
$this->_sections['rad_id1']['start'] = $this->_sections['rad_id1']['step'] > 0 ? 0 : $this->_sections['rad_id1']['loop']-1;
if ($this->_sections['rad_id1']['show']) {
    $this->_sections['rad_id1']['total'] = $this->_sections['rad_id1']['loop'];
    if ($this->_sections['rad_id1']['total'] == 0)
        $this->_sections['rad_id1']['show'] = false;
} else
    $this->_sections['rad_id1']['total'] = 0;
if ($this->_sections['rad_id1']['show']):

            for ($this->_sections['rad_id1']['index'] = $this->_sections['rad_id1']['start'], $this->_sections['rad_id1']['iteration'] = 1;
                 $this->_sections['rad_id1']['iteration'] <= $this->_sections['rad_id1']['total'];
                 $this->_sections['rad_id1']['index'] += $this->_sections['rad_id1']['step'], $this->_sections['rad_id1']['iteration']++):
$this->_sections['rad_id1']['rownum'] = $this->_sections['rad_id1']['iteration'];
$this->_sections['rad_id1']['index_prev'] = $this->_sections['rad_id1']['index'] - $this->_sections['rad_id1']['step'];
$this->_sections['rad_id1']['index_next'] = $this->_sections['rad_id1']['index'] + $this->_sections['rad_id1']['step'];
$this->_sections['rad_id1']['first']      = ($this->_sections['rad_id1']['iteration'] == 1);
$this->_sections['rad_id1']['last']       = ($this->_sections['rad_id1']['iteration'] == $this->_sections['rad_id1']['total']);
?>
                <?php unset($this->_sections['exam_id1']);
$this->_sections['exam_id1']['name'] = 'exam_id1';
$this->_sections['exam_id1']['loop'] = is_array($_loop=$this->_tpl_vars['tb_exam']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exam_id1']['show'] = true;
$this->_sections['exam_id1']['max'] = $this->_sections['exam_id1']['loop'];
$this->_sections['exam_id1']['step'] = 1;
$this->_sections['exam_id1']['start'] = $this->_sections['exam_id1']['step'] > 0 ? 0 : $this->_sections['exam_id1']['loop']-1;
if ($this->_sections['exam_id1']['show']) {
    $this->_sections['exam_id1']['total'] = $this->_sections['exam_id1']['loop'];
    if ($this->_sections['exam_id1']['total'] == 0)
        $this->_sections['exam_id1']['show'] = false;
} else
    $this->_sections['exam_id1']['total'] = 0;
if ($this->_sections['exam_id1']['show']):

            for ($this->_sections['exam_id1']['index'] = $this->_sections['exam_id1']['start'], $this->_sections['exam_id1']['iteration'] = 1;
                 $this->_sections['exam_id1']['iteration'] <= $this->_sections['exam_id1']['total'];
                 $this->_sections['exam_id1']['index'] += $this->_sections['exam_id1']['step'], $this->_sections['exam_id1']['iteration']++):
$this->_sections['exam_id1']['rownum'] = $this->_sections['exam_id1']['iteration'];
$this->_sections['exam_id1']['index_prev'] = $this->_sections['exam_id1']['index'] - $this->_sections['exam_id1']['step'];
$this->_sections['exam_id1']['index_next'] = $this->_sections['exam_id1']['index'] + $this->_sections['exam_id1']['step'];
$this->_sections['exam_id1']['first']      = ($this->_sections['exam_id1']['iteration'] == 1);
$this->_sections['exam_id1']['last']       = ($this->_sections['exam_id1']['iteration'] == $this->_sections['exam_id1']['total']);
?>
                <?php if ($this->_tpl_vars['examination'][$this->_sections['rad_id1']['index']]['0'] == $this->_tpl_vars['tb_exam'][$this->_sections['exam_id1']['index']]['id'] && $this->_tpl_vars['examination'][$this->_sections['rad_id1']['index']]['1'] == $this->_tpl_vars['type_id']): ?>
                <li> <span class="kt"> <span class="kt_t"> <?php 
            $i++;
            echo $i;
            echo "<a name=" .$i. "></a>";

             ?>、
            <?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id1']['index']]['content']; ?>
</span> </span><br>
                    <span class="kt_a"> 正确答案：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id1']['index']]['answer']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;您的答案：<?php echo $this->_tpl_vars['examination'][$this->_sections['rad_id1']['index']]['3']; ?>
 </span> <?php if ($this->_tpl_vars['tb_exam'][$this->_sections['exam_id1']['index']]['resolve'] != ""): ?> <span class="kt_a"> 问题解析：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id1']['index']]['resolve']; ?>
 </span> <?php endif; ?> </li>
                <?php endif; ?>
                <?php endfor; endif; ?>

                <?php endfor; endif; ?>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['type_id'] == 'fill'): ?>
                <li> <span style="width:100%; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 三、 填空题（每空<?php echo $this->_tpl_vars['fillFraction']; ?>
分，共<?php echo $this->_tpl_vars['Fills']; ?>
题）</span> <a name="fill"></a></li>
                <?php unset($this->_sections['rad_id2']);
$this->_sections['rad_id2']['name'] = 'rad_id2';
$this->_sections['rad_id2']['loop'] = is_array($_loop=$this->_tpl_vars['examination']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rad_id2']['show'] = true;
$this->_sections['rad_id2']['max'] = $this->_sections['rad_id2']['loop'];
$this->_sections['rad_id2']['step'] = 1;
$this->_sections['rad_id2']['start'] = $this->_sections['rad_id2']['step'] > 0 ? 0 : $this->_sections['rad_id2']['loop']-1;
if ($this->_sections['rad_id2']['show']) {
    $this->_sections['rad_id2']['total'] = $this->_sections['rad_id2']['loop'];
    if ($this->_sections['rad_id2']['total'] == 0)
        $this->_sections['rad_id2']['show'] = false;
} else
    $this->_sections['rad_id2']['total'] = 0;
if ($this->_sections['rad_id2']['show']):

            for ($this->_sections['rad_id2']['index'] = $this->_sections['rad_id2']['start'], $this->_sections['rad_id2']['iteration'] = 1;
                 $this->_sections['rad_id2']['iteration'] <= $this->_sections['rad_id2']['total'];
                 $this->_sections['rad_id2']['index'] += $this->_sections['rad_id2']['step'], $this->_sections['rad_id2']['iteration']++):
$this->_sections['rad_id2']['rownum'] = $this->_sections['rad_id2']['iteration'];
$this->_sections['rad_id2']['index_prev'] = $this->_sections['rad_id2']['index'] - $this->_sections['rad_id2']['step'];
$this->_sections['rad_id2']['index_next'] = $this->_sections['rad_id2']['index'] + $this->_sections['rad_id2']['step'];
$this->_sections['rad_id2']['first']      = ($this->_sections['rad_id2']['iteration'] == 1);
$this->_sections['rad_id2']['last']       = ($this->_sections['rad_id2']['iteration'] == $this->_sections['rad_id2']['total']);
?>
                <?php unset($this->_sections['exam_id2']);
$this->_sections['exam_id2']['name'] = 'exam_id2';
$this->_sections['exam_id2']['loop'] = is_array($_loop=$this->_tpl_vars['tb_exam']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exam_id2']['show'] = true;
$this->_sections['exam_id2']['max'] = $this->_sections['exam_id2']['loop'];
$this->_sections['exam_id2']['step'] = 1;
$this->_sections['exam_id2']['start'] = $this->_sections['exam_id2']['step'] > 0 ? 0 : $this->_sections['exam_id2']['loop']-1;
if ($this->_sections['exam_id2']['show']) {
    $this->_sections['exam_id2']['total'] = $this->_sections['exam_id2']['loop'];
    if ($this->_sections['exam_id2']['total'] == 0)
        $this->_sections['exam_id2']['show'] = false;
} else
    $this->_sections['exam_id2']['total'] = 0;
if ($this->_sections['exam_id2']['show']):

            for ($this->_sections['exam_id2']['index'] = $this->_sections['exam_id2']['start'], $this->_sections['exam_id2']['iteration'] = 1;
                 $this->_sections['exam_id2']['iteration'] <= $this->_sections['exam_id2']['total'];
                 $this->_sections['exam_id2']['index'] += $this->_sections['exam_id2']['step'], $this->_sections['exam_id2']['iteration']++):
$this->_sections['exam_id2']['rownum'] = $this->_sections['exam_id2']['iteration'];
$this->_sections['exam_id2']['index_prev'] = $this->_sections['exam_id2']['index'] - $this->_sections['exam_id2']['step'];
$this->_sections['exam_id2']['index_next'] = $this->_sections['exam_id2']['index'] + $this->_sections['exam_id2']['step'];
$this->_sections['exam_id2']['first']      = ($this->_sections['exam_id2']['iteration'] == 1);
$this->_sections['exam_id2']['last']       = ($this->_sections['exam_id2']['iteration'] == $this->_sections['exam_id2']['total']);
?>
                <?php if ($this->_tpl_vars['examination'][$this->_sections['rad_id2']['index']]['0'] == $this->_tpl_vars['tb_exam'][$this->_sections['exam_id2']['index']]['id'] && $this->_tpl_vars['examination'][$this->_sections['rad_id2']['index']]['1'] == $this->_tpl_vars['type_id']): ?>
                <li> <span class="kt"> <span class="kt_t"> <?php 
            $i++;
            echo $i;
            echo "<a name=" .$i. "></a>";

             ?>、
            <?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id2']['index']]['content']; ?>
</span> </span><br>
                    <span class="kt_a"> 正确答案：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id2']['index']]['answer']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;您的答案：<?php echo $this->_tpl_vars['examination'][$this->_sections['rad_id2']['index']]['3']; ?>
 </span> <?php if ($this->_tpl_vars['tb_exam'][$this->_sections['exam_id2']['index']]['resolve'] != ""): ?> <span class="kt_a"> 问题解析：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id2']['index']]['resolve']; ?>
 </span> <?php endif; ?> </li>
                <?php endif; ?>
                <?php endfor; endif; ?>

                <?php endfor; endif; ?>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['type_id'] == 'judgment'): ?>
                <li> <span style="width:100%; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 四、 判断题（正确的选正确；错误的选错误）每题<?php echo $this->_tpl_vars['judgmentFraction']; ?>
分，共<?php echo $this->_tpl_vars['Judgments']; ?>
题</span> <a name="judgment"></a></li>
                <?php unset($this->_sections['rad_id3']);
$this->_sections['rad_id3']['name'] = 'rad_id3';
$this->_sections['rad_id3']['loop'] = is_array($_loop=$this->_tpl_vars['examination']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rad_id3']['show'] = true;
$this->_sections['rad_id3']['max'] = $this->_sections['rad_id3']['loop'];
$this->_sections['rad_id3']['step'] = 1;
$this->_sections['rad_id3']['start'] = $this->_sections['rad_id3']['step'] > 0 ? 0 : $this->_sections['rad_id3']['loop']-1;
if ($this->_sections['rad_id3']['show']) {
    $this->_sections['rad_id3']['total'] = $this->_sections['rad_id3']['loop'];
    if ($this->_sections['rad_id3']['total'] == 0)
        $this->_sections['rad_id3']['show'] = false;
} else
    $this->_sections['rad_id3']['total'] = 0;
if ($this->_sections['rad_id3']['show']):

            for ($this->_sections['rad_id3']['index'] = $this->_sections['rad_id3']['start'], $this->_sections['rad_id3']['iteration'] = 1;
                 $this->_sections['rad_id3']['iteration'] <= $this->_sections['rad_id3']['total'];
                 $this->_sections['rad_id3']['index'] += $this->_sections['rad_id3']['step'], $this->_sections['rad_id3']['iteration']++):
$this->_sections['rad_id3']['rownum'] = $this->_sections['rad_id3']['iteration'];
$this->_sections['rad_id3']['index_prev'] = $this->_sections['rad_id3']['index'] - $this->_sections['rad_id3']['step'];
$this->_sections['rad_id3']['index_next'] = $this->_sections['rad_id3']['index'] + $this->_sections['rad_id3']['step'];
$this->_sections['rad_id3']['first']      = ($this->_sections['rad_id3']['iteration'] == 1);
$this->_sections['rad_id3']['last']       = ($this->_sections['rad_id3']['iteration'] == $this->_sections['rad_id3']['total']);
?>
                <?php unset($this->_sections['exam_id3']);
$this->_sections['exam_id3']['name'] = 'exam_id3';
$this->_sections['exam_id3']['loop'] = is_array($_loop=$this->_tpl_vars['tb_exam']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exam_id3']['show'] = true;
$this->_sections['exam_id3']['max'] = $this->_sections['exam_id3']['loop'];
$this->_sections['exam_id3']['step'] = 1;
$this->_sections['exam_id3']['start'] = $this->_sections['exam_id3']['step'] > 0 ? 0 : $this->_sections['exam_id3']['loop']-1;
if ($this->_sections['exam_id3']['show']) {
    $this->_sections['exam_id3']['total'] = $this->_sections['exam_id3']['loop'];
    if ($this->_sections['exam_id3']['total'] == 0)
        $this->_sections['exam_id3']['show'] = false;
} else
    $this->_sections['exam_id3']['total'] = 0;
if ($this->_sections['exam_id3']['show']):

            for ($this->_sections['exam_id3']['index'] = $this->_sections['exam_id3']['start'], $this->_sections['exam_id3']['iteration'] = 1;
                 $this->_sections['exam_id3']['iteration'] <= $this->_sections['exam_id3']['total'];
                 $this->_sections['exam_id3']['index'] += $this->_sections['exam_id3']['step'], $this->_sections['exam_id3']['iteration']++):
$this->_sections['exam_id3']['rownum'] = $this->_sections['exam_id3']['iteration'];
$this->_sections['exam_id3']['index_prev'] = $this->_sections['exam_id3']['index'] - $this->_sections['exam_id3']['step'];
$this->_sections['exam_id3']['index_next'] = $this->_sections['exam_id3']['index'] + $this->_sections['exam_id3']['step'];
$this->_sections['exam_id3']['first']      = ($this->_sections['exam_id3']['iteration'] == 1);
$this->_sections['exam_id3']['last']       = ($this->_sections['exam_id3']['iteration'] == $this->_sections['exam_id3']['total']);
?>
                <?php if ($this->_tpl_vars['examination'][$this->_sections['rad_id3']['index']]['0'] == $this->_tpl_vars['tb_exam'][$this->_sections['exam_id3']['index']]['id'] && $this->_tpl_vars['examination'][$this->_sections['rad_id3']['index']]['1'] == $this->_tpl_vars['type_id']): ?>
                <li> <span class="kt"> <span class="kt_t"> <?php 
            $i++;
            echo $i;
            echo "<a name=" .$i. "></a>";

             ?>、
            <?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id3']['index']]['content']; ?>
</span> </span><br>
                    <span class="kt_a"> 正确答案：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id3']['index']]['answer']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;您的答案：<?php echo $this->_tpl_vars['examination'][$this->_sections['rad_id3']['index']]['3']; ?>
 </span> <?php if ($this->_tpl_vars['tb_exam'][$this->_sections['exam_id3']['index']]['resolve'] != ""): ?> <span class="kt_a"> 问题解析：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id3']['index']]['resolve']; ?>
 </span> <?php endif; ?> </li>
                <?php endif; ?>
                <?php endfor; endif; ?>

                <?php endfor; endif; ?>

                <?php endif; ?>
                </p>
                <p> </p>
                <p><?php if ($this->_tpl_vars['type_id'] == 'answer'): ?>
                <li> <span style="width:100%; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 五、 简答题（每题<?php echo $this->_tpl_vars['answerFraction']; ?>
分，共<?php echo $this->_tpl_vars['Answers']; ?>
题）</span><a name="answer"></a> </li>
                <?php unset($this->_sections['rad_id4']);
$this->_sections['rad_id4']['name'] = 'rad_id4';
$this->_sections['rad_id4']['loop'] = is_array($_loop=$this->_tpl_vars['examination']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rad_id4']['show'] = true;
$this->_sections['rad_id4']['max'] = $this->_sections['rad_id4']['loop'];
$this->_sections['rad_id4']['step'] = 1;
$this->_sections['rad_id4']['start'] = $this->_sections['rad_id4']['step'] > 0 ? 0 : $this->_sections['rad_id4']['loop']-1;
if ($this->_sections['rad_id4']['show']) {
    $this->_sections['rad_id4']['total'] = $this->_sections['rad_id4']['loop'];
    if ($this->_sections['rad_id4']['total'] == 0)
        $this->_sections['rad_id4']['show'] = false;
} else
    $this->_sections['rad_id4']['total'] = 0;
if ($this->_sections['rad_id4']['show']):

            for ($this->_sections['rad_id4']['index'] = $this->_sections['rad_id4']['start'], $this->_sections['rad_id4']['iteration'] = 1;
                 $this->_sections['rad_id4']['iteration'] <= $this->_sections['rad_id4']['total'];
                 $this->_sections['rad_id4']['index'] += $this->_sections['rad_id4']['step'], $this->_sections['rad_id4']['iteration']++):
$this->_sections['rad_id4']['rownum'] = $this->_sections['rad_id4']['iteration'];
$this->_sections['rad_id4']['index_prev'] = $this->_sections['rad_id4']['index'] - $this->_sections['rad_id4']['step'];
$this->_sections['rad_id4']['index_next'] = $this->_sections['rad_id4']['index'] + $this->_sections['rad_id4']['step'];
$this->_sections['rad_id4']['first']      = ($this->_sections['rad_id4']['iteration'] == 1);
$this->_sections['rad_id4']['last']       = ($this->_sections['rad_id4']['iteration'] == $this->_sections['rad_id4']['total']);
?>
                <?php unset($this->_sections['exam_id4']);
$this->_sections['exam_id4']['name'] = 'exam_id4';
$this->_sections['exam_id4']['loop'] = is_array($_loop=$this->_tpl_vars['tb_exam']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exam_id4']['show'] = true;
$this->_sections['exam_id4']['max'] = $this->_sections['exam_id4']['loop'];
$this->_sections['exam_id4']['step'] = 1;
$this->_sections['exam_id4']['start'] = $this->_sections['exam_id4']['step'] > 0 ? 0 : $this->_sections['exam_id4']['loop']-1;
if ($this->_sections['exam_id4']['show']) {
    $this->_sections['exam_id4']['total'] = $this->_sections['exam_id4']['loop'];
    if ($this->_sections['exam_id4']['total'] == 0)
        $this->_sections['exam_id4']['show'] = false;
} else
    $this->_sections['exam_id4']['total'] = 0;
if ($this->_sections['exam_id4']['show']):

            for ($this->_sections['exam_id4']['index'] = $this->_sections['exam_id4']['start'], $this->_sections['exam_id4']['iteration'] = 1;
                 $this->_sections['exam_id4']['iteration'] <= $this->_sections['exam_id4']['total'];
                 $this->_sections['exam_id4']['index'] += $this->_sections['exam_id4']['step'], $this->_sections['exam_id4']['iteration']++):
$this->_sections['exam_id4']['rownum'] = $this->_sections['exam_id4']['iteration'];
$this->_sections['exam_id4']['index_prev'] = $this->_sections['exam_id4']['index'] - $this->_sections['exam_id4']['step'];
$this->_sections['exam_id4']['index_next'] = $this->_sections['exam_id4']['index'] + $this->_sections['exam_id4']['step'];
$this->_sections['exam_id4']['first']      = ($this->_sections['exam_id4']['iteration'] == 1);
$this->_sections['exam_id4']['last']       = ($this->_sections['exam_id4']['iteration'] == $this->_sections['exam_id4']['total']);
?>
                <?php if ($this->_tpl_vars['examination'][$this->_sections['rad_id4']['index']]['0'] == $this->_tpl_vars['tb_exam'][$this->_sections['exam_id4']['index']]['id'] && $this->_tpl_vars['examination'][$this->_sections['rad_id4']['index']]['1'] == $this->_tpl_vars['type_id']): ?>
                <li> <span class="kt"> <span class="kt_t"> <?php 
            $i++;
            echo $i;
            echo "<a name=" .$i. "></a>";

             ?>、
            <?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id4']['index']]['content']; ?>
</span> </span><br>
                    <span class="kt_a"> 正确答案：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id4']['index']]['answer']; ?>
</span><br>
                    <span class="kt_a"> 您的答案：<?php echo $this->_tpl_vars['examination'][$this->_sections['rad_id4']['index']]['3']; ?>
 </span>
                    <?php if ($this->_tpl_vars['tb_exam'][$this->_sections['exam_id4']['index']]['resolve'] != ""): ?> <span class="kt_a"> 问题解析：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id4']['index']]['resolve']; ?>
 </span> <?php endif; ?> </li>
                <?php endif; ?>
                <?php endfor; endif; ?>

                <?php endfor; endif; ?>

                <?php endif; ?>

                <?php if ($this->_tpl_vars['type_id'] == 'discourse'): ?>
                <li> <span style="width:100%; float:left; padding-left:13px; line-height:28px; background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 六、 论述题（每题<?php echo $this->_tpl_vars['discourseFraction']; ?>
分，共<?php echo $this->_tpl_vars['Discourses']; ?>
题）</span><a name="discourse"></a> </li>
                <?php unset($this->_sections['rad_id5']);
$this->_sections['rad_id5']['name'] = 'rad_id5';
$this->_sections['rad_id5']['loop'] = is_array($_loop=$this->_tpl_vars['examination']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rad_id5']['show'] = true;
$this->_sections['rad_id5']['max'] = $this->_sections['rad_id5']['loop'];
$this->_sections['rad_id5']['step'] = 1;
$this->_sections['rad_id5']['start'] = $this->_sections['rad_id5']['step'] > 0 ? 0 : $this->_sections['rad_id5']['loop']-1;
if ($this->_sections['rad_id5']['show']) {
    $this->_sections['rad_id5']['total'] = $this->_sections['rad_id5']['loop'];
    if ($this->_sections['rad_id5']['total'] == 0)
        $this->_sections['rad_id5']['show'] = false;
} else
    $this->_sections['rad_id5']['total'] = 0;
if ($this->_sections['rad_id5']['show']):

            for ($this->_sections['rad_id5']['index'] = $this->_sections['rad_id5']['start'], $this->_sections['rad_id5']['iteration'] = 1;
                 $this->_sections['rad_id5']['iteration'] <= $this->_sections['rad_id5']['total'];
                 $this->_sections['rad_id5']['index'] += $this->_sections['rad_id5']['step'], $this->_sections['rad_id5']['iteration']++):
$this->_sections['rad_id5']['rownum'] = $this->_sections['rad_id5']['iteration'];
$this->_sections['rad_id5']['index_prev'] = $this->_sections['rad_id5']['index'] - $this->_sections['rad_id5']['step'];
$this->_sections['rad_id5']['index_next'] = $this->_sections['rad_id5']['index'] + $this->_sections['rad_id5']['step'];
$this->_sections['rad_id5']['first']      = ($this->_sections['rad_id5']['iteration'] == 1);
$this->_sections['rad_id5']['last']       = ($this->_sections['rad_id5']['iteration'] == $this->_sections['rad_id5']['total']);
?>
                <?php unset($this->_sections['exam_id5']);
$this->_sections['exam_id5']['name'] = 'exam_id5';
$this->_sections['exam_id5']['loop'] = is_array($_loop=$this->_tpl_vars['tb_exam']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exam_id5']['show'] = true;
$this->_sections['exam_id5']['max'] = $this->_sections['exam_id5']['loop'];
$this->_sections['exam_id5']['step'] = 1;
$this->_sections['exam_id5']['start'] = $this->_sections['exam_id5']['step'] > 0 ? 0 : $this->_sections['exam_id5']['loop']-1;
if ($this->_sections['exam_id5']['show']) {
    $this->_sections['exam_id5']['total'] = $this->_sections['exam_id5']['loop'];
    if ($this->_sections['exam_id5']['total'] == 0)
        $this->_sections['exam_id5']['show'] = false;
} else
    $this->_sections['exam_id5']['total'] = 0;
if ($this->_sections['exam_id5']['show']):

            for ($this->_sections['exam_id5']['index'] = $this->_sections['exam_id5']['start'], $this->_sections['exam_id5']['iteration'] = 1;
                 $this->_sections['exam_id5']['iteration'] <= $this->_sections['exam_id5']['total'];
                 $this->_sections['exam_id5']['index'] += $this->_sections['exam_id5']['step'], $this->_sections['exam_id5']['iteration']++):
$this->_sections['exam_id5']['rownum'] = $this->_sections['exam_id5']['iteration'];
$this->_sections['exam_id5']['index_prev'] = $this->_sections['exam_id5']['index'] - $this->_sections['exam_id5']['step'];
$this->_sections['exam_id5']['index_next'] = $this->_sections['exam_id5']['index'] + $this->_sections['exam_id5']['step'];
$this->_sections['exam_id5']['first']      = ($this->_sections['exam_id5']['iteration'] == 1);
$this->_sections['exam_id5']['last']       = ($this->_sections['exam_id5']['iteration'] == $this->_sections['exam_id5']['total']);
?>
                <?php if ($this->_tpl_vars['examination'][$this->_sections['rad_id5']['index']]['0'] == $this->_tpl_vars['tb_exam'][$this->_sections['exam_id5']['index']]['id'] && $this->_tpl_vars['examination'][$this->_sections['rad_id5']['index']]['1'] == $this->_tpl_vars['type_id']): ?>
                <li> <span class="kt"> <span class="kt_t"> <?php 
            $i++;
            echo $i;
            echo "<a name=" .$i. "></a>";

             ?>、
            <?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id5']['index']]['content']; ?>
</span> </span><br>
                    <span class="kt_a"> 正确答案：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id5']['index']]['answer']; ?>
</span><br>
                    <span class="kt_a"> 您的答案：<?php echo $this->_tpl_vars['examination'][$this->_sections['rad_id5']['index']]['3']; ?>
 </span>
                    <?php if ($this->_tpl_vars['tb_exam'][$this->_sections['exam_id5']['index']]['resolve'] != ""): ?> <span class="kt_a"> 问题解析：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id5']['index']]['resolve']; ?>
 </span> <?php endif; ?> </li>
                <?php endif; ?>
                <?php endfor; endif; ?>
                <?php endfor; endif; ?>
                <?php endif; ?>

                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>
    </div>
    <?php endif; ?> </div>
</div>
<!--<script language="javascript">-->
<!--    function chklogin(form){-->
<!--    if(form.examid.value==''){-->
<!--    alert('请选择考试名称！');-->
<!--    form.examid.focus();-->
<!--    return false;-->
<!--    }-->
<!--    return true;-->
<!--    }-->
<!--</script>-->