<?php /* Smarty version 2.6.19, created on 2016-12-01 09:23:55
         compiled from search_log.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'search_log.phtml', 67, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>===煤矿考试系统===</title>
    <link href="css/base.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--内容开始 -->
	<div style="background-color: #fff;width: 1259px;margin-left: auto;margin-right: auto;">
        <div id="sub_right">
            <div class="right1">
        <?php if ($this->_tpl_vars['Search'] == 'T'): ?>
                <h2 style="text-align: center">练习记录</h2>
                    <DIV>
                        <DIV style="padding-left:6px;">
                            <div style="LINE-HEIGHT: 25px; WIDTH: 8%; FLOAT: left; text-align:center; HEIGHT: 25px;border:#21de26 1px solid;">用户名</div>
                            <div style="LINE-HEIGHT: 25px; WIDTH: 13%; FLOAT: left; text-align:center; HEIGHT: 25px;border:#21de26 1px solid;border-left:none;">题型</div>
                            <div style="LINE-HEIGHT: 25px; WIDTH: 39%; FLOAT: left; text-align:center; HEIGHT: 25px; border:#21de26 1px solid;border-left:none;">内容</div>
                            <div style="LINE-HEIGHT: 25px; WIDTH: 13%; FLOAT: left; text-align:center; HEIGHT: 25px; border:#21de26 1px solid;border-left:none;">正确答案</div>
                            <div style="LINE-HEIGHT: 25px; WIDTH: 13%; FLOAT: left; text-align:center; HEIGHT: 25px; border:#21de26 1px solid;border-left:none;">他的答案 </div>
                        <div style="LINE-HEIGHT: 25px; WIDTH: 13%; FLOAT: left; text-align:center; HEIGHT: 25px; border:#21de26 1px solid;border-left:none;">练习类型 </div>
                        </DIV>
<!--                            <DIV style="padding-left:6px;">-->
<!--                            <UL>-->
<!--                                <LI style="LINE-HEIGHT: 25px; WIDTH: 8%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border:#21de26 1px solid;border-bottom: none;">用户名</LI>-->
<!--                                <LI style="LINE-HEIGHT: 25px; WIDTH: 13%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border:#21de26 1px solid;border-left:none;border-bottom: none;">题型</LI>-->
<!--                                <LI style="LINE-HEIGHT: 25px; WIDTH: 39%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border:#21de26 1px solid;border-left:none;border-bottom: none;">内容</LI>-->
<!--                                <LI style="LINE-HEIGHT: 25px; WIDTH: 13%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border:#21de26 1px solid;border-left:none;border-bottom: none;">正确答案 </LI>-->
<!--                                <LI style="LINE-HEIGHT: 25px; WIDTH: 13%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border:#21de26 1px solid;border-left:none;border-bottom: none;">他的答案 </LI>-->
<!--                                <LI style="LINE-HEIGHT: 25px; WIDTH: 13%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border:#21de26 1px solid;border-left:none;border-bottom: none;">练习类型</LI>-->
<!--                            </UL>-->
<!--                        </DIV>-->
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
                                    <div style="LINE-HEIGHT: 23px; WIDTH: 8%; FLOAT: left; HEIGHT: 23px;text-align:center;  border:#21de26 1px solid;border-top:none;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['username']; ?>
</div>
                                    <?php $this->assign('qq', $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['questype']); ?>
                                    <div style="LINE-HEIGHT: 23px; WIDTH: 13%;  FLOAT: left; HEIGHT: 23px;text-align:center; border:#21de26 1px solid;border-top:none;border-left:none;"><?php echo $this->_tpl_vars['exam_type'][$this->_tpl_vars['qq']]; ?>
</div>
                                    <div style="LINE-HEIGHT: 23px; WIDTH: 39%; FLOAT: left; HEIGHT: 23px;text-align:center; border:#21de26 1px solid;overflow: hidden;border-top:none;border-left:none;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['content']; ?>
</div>
                                    <div style="LINE-HEIGHT: 23px; WIDTH: 13%; FLOAT: left; text-align:center; HEIGHT: 23px;  border:#21de26 1px solid;overflow: hidden;border-top:none;border-left:none;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['answer']; ?>
 </div>
                                    <div style="LINE-HEIGHT: 23px; WIDTH: 13%; FLOAT: left; text-align:center; HEIGHT: 23px;  border:#21de26 1px solid;overflow: hidden;border-top:none;border-left:none;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['useranswer']; ?>
 </div>
                                    <?php $this->assign('tt', $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['type']); ?>
                                    <div style="LINE-HEIGHT: 23px; WIDTH: 13%; FLOAT: left; text-align:center; HEIGHT: 23px; border:#21de26 1px solid;border-top:none;border-left:none;"><?php echo $this->_tpl_vars['types'][$this->_tpl_vars['tt']]; ?>
</div>
                            </DIV>
                            <?php endfor; endif; ?>
                            <br />
                        <div style="clear: both;"> </div>
                        <div style="padding-left:336px; "> <?php if ($this->_tpl_vars['bcjyzs']['data'] != false): ?>
                            <div style="height:22px; padding-bottom: 10px;padding-top:6px;margin-left: auto;margin-right: auto;">
                                <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['bcjyzs']['countRs']; ?>
条&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['bcjyzs']['pageSize']; ?>
条&nbsp;&nbsp;第<?php echo $this->_tpl_vars['bcjyzs']['page']; ?>
页/共<?php echo $this->_tpl_vars['bcjyzs']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/search_log.php?page=<?php echo $this->_tpl_vars['bcjyzs']['first']; ?>
&start_time=<?php echo $this->_tpl_vars['start_time']; ?>
&end_time=<?php echo $this->_tpl_vars['end_time']; ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/search_log.php?page=<?php echo $this->_tpl_vars['bcjyzs']['previous']; ?>
&start_time=<?php echo $this->_tpl_vars['start_time']; ?>
&end_time=<?php echo $this->_tpl_vars['end_time']; ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/search_log.php?page=<?php echo $this->_tpl_vars['bcjyzs']['next']; ?>
&start_time=<?php echo $this->_tpl_vars['start_time']; ?>
&end_time=<?php echo $this->_tpl_vars['end_time']; ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/search_log.php?page=<?php echo $this->_tpl_vars['bcjyzs']['last']; ?>
&start_time=<?php echo $this->_tpl_vars['start_time']; ?>
&end_time=<?php echo $this->_tpl_vars['end_time']; ?>
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
/search_log.php?page=<?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
&start_time=<?php echo $this->_tpl_vars['start_time']; ?>
&end_time=<?php echo $this->_tpl_vars['end_time']; ?>
" class="<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?><?php endif; ?></a> </div>
                                <?php endfor; endif; ?>
                            </div>
                            <?php endif; ?> </div>
                    </DIV>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['Search'] == 'F'): ?>
            <form name="form_addbccdinfo" method="post" action="search_log.php" >

                        <div class="k_con">
                            开始时间：
                            <select name="years" id="years">

                                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayYear'],'selected' => $this->_tpl_vars['years']), $this);?>



                            </select>
                            年
                            <select name="months" id="months">

                                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayMonth'],'selected' => 01), $this);?>



                            </select>
                            月
                            <select name="days" id="days">

                                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayDay'],'selected' => 01), $this);?>



                            </select>
                            日

                           <br />
                            <br/>
                            结束时间：
                            <select name="year" id="year">

                                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayYear'],'selected' => $this->_tpl_vars['years']), $this);?>



                            </select>
                            年
                            <select name="month" id="month">

                                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayMonth'],'selected' => $this->_tpl_vars['months']), $this);?>



                            </select>
                            月
                            <select name="day" id="day">

                                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayDay'],'selected' => $this->_tpl_vars['days']), $this);?>



                            </select>
                            日

                           <br />
                            <br/>
                            <input type="submit" name="submit" value="查询" />
                        </div>


                </div>
            </form>
        <?php endif; ?>
        </div>
    </div>
    </div>
<!--内容结束 -->
</body>
</html>