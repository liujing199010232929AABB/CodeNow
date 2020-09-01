<?php /* Smarty version 2.6.19, created on 2016-10-09 09:48:28
         compiled from aeditbccdswf.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'aeditbccdswf.phtml', 37, false),)), $this); ?>
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
    <br />
    <br />
    <br />

    <?php if ($this->_tpl_vars['edit'] == 't'): ?>
    <div class="right_con_form">
  <form name="form_addbcjyz" method="post" action="" enctype="multipart/form-data" onsubmit="return chkinputbccdinfo(this)">
       <p><br />
        所属类别：
        <select name="pro_class" id="pro_class">

      <?php unset($this->_sections['bccdnameid']);
$this->_sections['bccdnameid']['name'] = 'bccdnameid';
$this->_sections['bccdnameid']['loop'] = is_array($_loop=$this->_tpl_vars['arrayBccdnames1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['bccdnameid']['show'] = true;
$this->_sections['bccdnameid']['max'] = $this->_sections['bccdnameid']['loop'];
$this->_sections['bccdnameid']['step'] = 1;
$this->_sections['bccdnameid']['start'] = $this->_sections['bccdnameid']['step'] > 0 ? 0 : $this->_sections['bccdnameid']['loop']-1;
if ($this->_sections['bccdnameid']['show']) {
    $this->_sections['bccdnameid']['total'] = $this->_sections['bccdnameid']['loop'];
    if ($this->_sections['bccdnameid']['total'] == 0)
        $this->_sections['bccdnameid']['show'] = false;
} else
    $this->_sections['bccdnameid']['total'] = 0;
if ($this->_sections['bccdnameid']['show']):

            for ($this->_sections['bccdnameid']['index'] = $this->_sections['bccdnameid']['start'], $this->_sections['bccdnameid']['iteration'] = 1;
                 $this->_sections['bccdnameid']['iteration'] <= $this->_sections['bccdnameid']['total'];
                 $this->_sections['bccdnameid']['index'] += $this->_sections['bccdnameid']['step'], $this->_sections['bccdnameid']['iteration']++):
$this->_sections['bccdnameid']['rownum'] = $this->_sections['bccdnameid']['iteration'];
$this->_sections['bccdnameid']['index_prev'] = $this->_sections['bccdnameid']['index'] - $this->_sections['bccdnameid']['step'];
$this->_sections['bccdnameid']['index_next'] = $this->_sections['bccdnameid']['index'] + $this->_sections['bccdnameid']['step'];
$this->_sections['bccdnameid']['first']      = ($this->_sections['bccdnameid']['iteration'] == 1);
$this->_sections['bccdnameid']['last']       = ($this->_sections['bccdnameid']['iteration'] == $this->_sections['bccdnameid']['total']);
?>
       <?php if ($this->_tpl_vars['arrayBccdnames1'][$this->_sections['bccdnameid']['index']]['id'] == $this->_tpl_vars['bcjyz'][0]['pro_class']): ?>
        <option selected="selected" value="<?php echo $this->_tpl_vars['arrayBccdnames1'][$this->_sections['bccdnameid']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['arrayBccdnames1'][$this->_sections['bccdnameid']['index']]['typename']; ?>
</option>
        <?php endif; ?>
        <?php endfor; endif; ?>
    	<?php echo $this->_tpl_vars['displayType']; ?>

    
        </select>
      </p>
      <p>题型：
        <select name="pro_type" id="pro_type">

         	<?php echo $this->_tpl_vars['tb_exam_type']; ?>

        </select>
        <br />
      <br />
          试题难度：
          <select name="degree" id="degree">
              <option value="">请选择</option>
              <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['degreeArr'],'selected' => $this->_tpl_vars['bcjyz'][0]['degreeid']), $this);?>

          </select>
          <br />
          <br />
        分数：<input type="text" name="fraction" size="15" value="<?php echo $this->_tpl_vars['bcjyz'][0]['fraction']; ?>
" class="input1" />
<br/>
  <br/>
          是否必须掌握：<input type="radio" name="mustknow" value="1" <?php if ($this->_tpl_vars['bcjyz'][0]['mustknown'] == 1): ?>checked<?php endif; ?>>是 &nbsp;<input type="radio" name="mustknow" value="0" <?php if ($this->_tpl_vars['bcjyz'][0]['mustknown'] == 0): ?>checked<?php endif; ?>>否
          <br/>
          <br/>
          语音上传：
          <input name="sound" type="file" class="input1" id="sound" size="45" />
          <br/>
          <br/>
        问题：<?php echo $this->_reg_objects['util'][0]->editor('content',$this->_tpl_vars['bcjyz'][0]['content'],"90%",'230');?>

          <br/> <br />
   选项： 
   <input name="search_list" type="text" id="search_list" value="<?php echo $this->_tpl_vars['bcjyz'][0]['search_list']; ?>
" size="10" class="input1" />（*在添加单选和多选题时，请注意填写每题的选项数目 ）
  <br/> <br />
 答案： <textarea name="answer" id="answer" cols="103" rows="10" class="input1"><?php echo $this->_tpl_vars['bcjyz'][0]['answer']; ?>
</textarea>
   <br/> <br />  
    解析： <textarea name="resolve" id="resolve" cols="103" rows="10" class="input1"><?php echo $this->_tpl_vars['bcjyz'][0]['resolve']; ?>
</textarea>
   <br/> <br />
          <?php if ($this->_tpl_vars['bcjyz'][0]['isactive'] == 1): ?>
          <input type="radio" name="isactive" value="1" checked/>启用&nbsp;&nbsp;&nbsp;<input type="radio" name="isactive" value="0"/>禁用
          <?php else: ?>
          <input type="radio" name="isactive" value="1"/>启用&nbsp;&nbsp;&nbsp;<input type="radio" name="isactive" value="0" checked/>禁用
          <?php endif; ?>
          <br/> <br />
    <input type="hidden" name="bcjyzid" value="<?php echo $this->_tpl_vars['bcjyz'][0]['id']; ?>
">
      <input type="submit" value="提交">&nbsp;&nbsp;&nbsp;<?php if ($this->_tpl_vars['q'] != 't'): ?><input type="button" value="返回" onclick="javascript:history.go(-1)"><?php else: ?><input type="button" value="返回" onclick="javascript:history.go(-2)"><?php endif; ?>
    
   <br />
        <br />
    

    </form>
    </div>
    <?php endif; ?> </div>
</div>

<script language="javascript">
    function chkinputbccdinfo(form){
    if(form.pro_class.value==''){
    alert('请选择工种！');
    form.pro_class.focus();
    return false;
    }
    if(form.pro_type.value==''){
    alert('请选择题型！');
    form.pro_type.focus();
    return false;
    }

    if(form.fraction.value==''){
    alert('请输入分值！');
    form.fraction.focus();
    return false;
    }

    var Expression=/^([1-9])([0-9])*[0-9]$|^[1-9]$/;		//判断提交的值是否为正整数的正则表达式
    var objExp=new RegExp(Expression);
    if(!objExp.test(form.fraction.value)){
    alert('请输入正确的分值！');
    form.fraction.focus();
    return false;
    }
    if(form.answer.value==''){
    alert('请填写答案！');
    form.answer.focus();
    return false;
    }
    if(form.degree.value==''){
    alert('请选择试题难度！');
    form.degree.focus();
    return false;
    }
    return true;
    }

</script>