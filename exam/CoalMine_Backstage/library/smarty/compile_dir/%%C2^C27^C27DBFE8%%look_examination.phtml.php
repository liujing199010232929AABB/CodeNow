<?php /* Smarty version 2.6.19, created on 2016-09-28 10:42:44
         compiled from look_examination.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'look_examination.phtml', 248, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上岗试卷——————<?php echo $this->_tpl_vars['bccdname'][0]['title']; ?>
</title>
<link rel=stylesheet type=text/css href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/examination.css">
</head>
<body>
<object id="WebBrowser" classid="ClSID:8856F961-340A-11D0-A96B-00C04Fd705A2" width="0" height="0">
</object>
<table width="100%" border="1" >
  <tr>
    <td class="sub_c_bt" style="padding-top:12px; color:#000000; line-height:20px; font-size:14px; font-weight:bold; text-align:center;">
    <?php echo $this->_tpl_vars['bccdname'][0]['title']; ?>
<br />
        <span style=" color:#FF0033; font-weight:normal; padding-right:30px; font-size:12px; float:right;">计时：<?php echo $this->_tpl_vars['times']; ?>
分钟  &nbsp;  题数：<?php echo $this->_tpl_vars['counts']; ?>
题&nbsp;&nbsp; <a href="#" onClick="document.all.WebBrowser.Execwb(6,1)">试卷</a></span>
    </td>
  </tr>
    <form name="form_addbccdinfo" method="post" action="" enctype="multipart/form-data">
    <tr>
    <td>&nbsp;</td>
  </tr>
  <tr class="k_con_t_c">
    <td class="k_con_t_c_text">姓名：____________    工号：____________ 工种：____________     分数：______ </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <?php 
              $i=0;
              $m=0;
               ?>
              <?php if ($this->_tpl_vars['Radio'] == T): ?>
  <tr>
    <td> <span style="width:913px; float:left; padding-left:13px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"> <?php 
              $m++;
              switch($m){
              case "1":
              $n="一";
              break;
              case "2":
              $n="二";
              break;
              case "3":
              $n="三";
              break;
              case "4":
              $n="四";
              break;
              case "5":
              $n="五";
              break;
              case "6":
              $n="六";
              break;
              }
              echo $n;
               ?>、 单选题（选择一个正确答案字母）每题<?php echo $this->_tpl_vars['radiofraction']; ?>
分，共<?php echo $this->_tpl_vars['Radios']; ?>
题。</span></td>
  </tr>
   <?php unset($this->_sections['rad_id']);
$this->_sections['rad_id']['name'] = 'rad_id';
$this->_sections['rad_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayRadio']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
  <tr>
    <td><span class="kt"> <span class="kt_t"> <?php 
              $i++;
              echo $i;
               ?>、<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['content']; ?>
</span> </span> <span class="kt_a">
        <?php if ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 6): ?> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="D" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span><span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="E" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">E</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="F" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">F</span>
        <?php elseif ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 5): ?> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="D" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span><span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="E" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">E</span>
        <?php elseif ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 4): ?> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="D" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span>
        <?php elseif ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 3): ?> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <?php else: ?> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <?php endif; ?> </span> </td>
  </tr>
   <?php endfor; endif; ?>
            <?php endif; ?>
            
            
            <?php if ($this->_tpl_vars['Checkbox'] == T): ?>
  
  <tr>
    <td><span style="width:913px; float:left; padding-left:13px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"> <?php 
              $m++;
              switch($m){
              case "1":
              $n="一";
              break;
              case "2":
              $n="二";
              break;
              case "3":
              $n="三";
              break;
              case "4":
              $n="四";
              break;
              case "5":
              $n="五";
              break;
              case "6":
              $n="六";
              break;
              }
              echo $n;
               ?>、 多选题（选择两个或两个以上正确答案字母）每题<?php echo $this->_tpl_vars['checkboxfraction']; ?>
分，共<?php echo $this->_tpl_vars['Checkboxs']; ?>
题</span> </td>
  </tr>
    <?php unset($this->_sections['chk_id']);
$this->_sections['chk_id']['name'] = 'chk_id';
$this->_sections['chk_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayCheckbox']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['chk_id']['show'] = true;
$this->_sections['chk_id']['max'] = $this->_sections['chk_id']['loop'];
$this->_sections['chk_id']['step'] = 1;
$this->_sections['chk_id']['start'] = $this->_sections['chk_id']['step'] > 0 ? 0 : $this->_sections['chk_id']['loop']-1;
if ($this->_sections['chk_id']['show']) {
    $this->_sections['chk_id']['total'] = $this->_sections['chk_id']['loop'];
    if ($this->_sections['chk_id']['total'] == 0)
        $this->_sections['chk_id']['show'] = false;
} else
    $this->_sections['chk_id']['total'] = 0;
if ($this->_sections['chk_id']['show']):

            for ($this->_sections['chk_id']['index'] = $this->_sections['chk_id']['start'], $this->_sections['chk_id']['iteration'] = 1;
                 $this->_sections['chk_id']['iteration'] <= $this->_sections['chk_id']['total'];
                 $this->_sections['chk_id']['index'] += $this->_sections['chk_id']['step'], $this->_sections['chk_id']['iteration']++):
$this->_sections['chk_id']['rownum'] = $this->_sections['chk_id']['iteration'];
$this->_sections['chk_id']['index_prev'] = $this->_sections['chk_id']['index'] - $this->_sections['chk_id']['step'];
$this->_sections['chk_id']['index_next'] = $this->_sections['chk_id']['index'] + $this->_sections['chk_id']['step'];
$this->_sections['chk_id']['first']      = ($this->_sections['chk_id']['iteration'] == 1);
$this->_sections['chk_id']['last']       = ($this->_sections['chk_id']['iteration'] == $this->_sections['chk_id']['total']);
?>
  <tr>
    <td><span class="kt"> <span class="kt_t"> <?php 
              $i++;
              echo $i;
               ?>、<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['content']; ?>
</span> </span> <span class="kt_a">
        <?php if ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 8): ?> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">E</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">F</span><span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="G" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">G</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="H" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">H</span>
        <?php elseif ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 7): ?> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">E</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">F</span><span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="G" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">G</span>
        <?php elseif ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 6): ?> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">E</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">F</span>
        <?php elseif ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 5): ?> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">E</span> <?php else: ?> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">A</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">B</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">C</span> <span class="kt_a_1">
              <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1">D</span> <?php endif; ?> </span> </td>
  </tr>
     <?php endfor; endif; ?>
            <?php endif; ?>
            
            <?php if ($this->_tpl_vars['Fill'] == T): ?>
  <tr>
    <td><span style="width:913px; float:left; padding-left:13px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"> <?php 
              $m++;
              switch($m){
              case "1":
              $n="一";
              break;
              case "2":
              $n="二";
              break;
              case "3":
              $n="三";
              break;
              case "4":
              $n="四";
              break;
              case "5":
              $n="五";
              break;
              case "6":
              $n="六";
              break;
              }
              echo $n;
               ?>、 填空题（每题<?php echo $this->_tpl_vars['fillfraction']; ?>
分，共<?php echo $this->_tpl_vars['Fills']; ?>
题）</span> </td>
  </tr>
      <?php unset($this->_sections['fil_id']);
$this->_sections['fil_id']['name'] = 'fil_id';
$this->_sections['fil_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayFill']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['fil_id']['show'] = true;
$this->_sections['fil_id']['max'] = $this->_sections['fil_id']['loop'];
$this->_sections['fil_id']['step'] = 1;
$this->_sections['fil_id']['start'] = $this->_sections['fil_id']['step'] > 0 ? 0 : $this->_sections['fil_id']['loop']-1;
if ($this->_sections['fil_id']['show']) {
    $this->_sections['fil_id']['total'] = $this->_sections['fil_id']['loop'];
    if ($this->_sections['fil_id']['total'] == 0)
        $this->_sections['fil_id']['show'] = false;
} else
    $this->_sections['fil_id']['total'] = 0;
if ($this->_sections['fil_id']['show']):

            for ($this->_sections['fil_id']['index'] = $this->_sections['fil_id']['start'], $this->_sections['fil_id']['iteration'] = 1;
                 $this->_sections['fil_id']['iteration'] <= $this->_sections['fil_id']['total'];
                 $this->_sections['fil_id']['index'] += $this->_sections['fil_id']['step'], $this->_sections['fil_id']['iteration']++):
$this->_sections['fil_id']['rownum'] = $this->_sections['fil_id']['iteration'];
$this->_sections['fil_id']['index_prev'] = $this->_sections['fil_id']['index'] - $this->_sections['fil_id']['step'];
$this->_sections['fil_id']['index_next'] = $this->_sections['fil_id']['index'] + $this->_sections['fil_id']['step'];
$this->_sections['fil_id']['first']      = ($this->_sections['fil_id']['iteration'] == 1);
$this->_sections['fil_id']['last']       = ($this->_sections['fil_id']['iteration'] == $this->_sections['fil_id']['total']);
?>
  <tr>
    <td><span class="kt" style="background-color:#FFFFFF; border:1px dashed #FF6600; color:#333333;"> <span style="padding-top:4px; float:left;"> <?php 
              $i++;
              echo $i;
               ?>、<?php echo ((is_array($_tmp=$this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['content'])) ? $this->_run_mod_handler('replace', true, $_tmp, '______', " <span style=' line-height:22px; padding-left:2px; padding-right:2px;'>
              <input name='fill[]' type='text'  style='width:80px; height:18px; line-height:18px; border:1px solid #DDDDDD;' id='fill' size='10' maxlength='50'>
              </span>") : smarty_modifier_replace($_tmp, '______', " <span style=' line-height:22px; padding-left:2px; padding-right:2px;'>
              <input name='fill[]' type='text'  style='width:80px; height:18px; line-height:18px; border:1px solid #DDDDDD;' id='fill' size='10' maxlength='50'>
              </span>")); ?>
 </span> </span></td>
  </tr>
    <?php endfor; endif; ?>
            <?php endif; ?>
            
            <?php if ($this->_tpl_vars['Judgment'] == T): ?>
  <tr>
    <td><span style="width:913px; float:left; padding-left:13px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"> <?php 
              $m++;
              switch($m){
              case "1":
              $n="一";
              break;
              case "2":
              $n="二";
              break;
              case "3":
              $n="三";
              break;
              case "4":
              $n="四";
              break;
              case "5":
              $n="五";
              break;
              case "6":
              $n="六";
              break;
              }
              echo $n;
               ?>、 判断题（正确的选正确；错误的选错误）每题<?php echo $this->_tpl_vars['judgmentfraction']; ?>
分，共<?php echo $this->_tpl_vars['Judgments']; ?>
题</span> </td>
  </tr>
       <?php unset($this->_sections['jud_id']);
$this->_sections['jud_id']['name'] = 'jud_id';
$this->_sections['jud_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayJudgment']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['jud_id']['show'] = true;
$this->_sections['jud_id']['max'] = $this->_sections['jud_id']['loop'];
$this->_sections['jud_id']['step'] = 1;
$this->_sections['jud_id']['start'] = $this->_sections['jud_id']['step'] > 0 ? 0 : $this->_sections['jud_id']['loop']-1;
if ($this->_sections['jud_id']['show']) {
    $this->_sections['jud_id']['total'] = $this->_sections['jud_id']['loop'];
    if ($this->_sections['jud_id']['total'] == 0)
        $this->_sections['jud_id']['show'] = false;
} else
    $this->_sections['jud_id']['total'] = 0;
if ($this->_sections['jud_id']['show']):

            for ($this->_sections['jud_id']['index'] = $this->_sections['jud_id']['start'], $this->_sections['jud_id']['iteration'] = 1;
                 $this->_sections['jud_id']['iteration'] <= $this->_sections['jud_id']['total'];
                 $this->_sections['jud_id']['index'] += $this->_sections['jud_id']['step'], $this->_sections['jud_id']['iteration']++):
$this->_sections['jud_id']['rownum'] = $this->_sections['jud_id']['iteration'];
$this->_sections['jud_id']['index_prev'] = $this->_sections['jud_id']['index'] - $this->_sections['jud_id']['step'];
$this->_sections['jud_id']['index_next'] = $this->_sections['jud_id']['index'] + $this->_sections['jud_id']['step'];
$this->_sections['jud_id']['first']      = ($this->_sections['jud_id']['iteration'] == 1);
$this->_sections['jud_id']['last']       = ($this->_sections['jud_id']['iteration'] == $this->_sections['jud_id']['total']);
?>
  <tr>
    <td><span class="kt"> <span class="kt_t"> <?php 
              $i++;
              echo $i;
               ?>、<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['content']; ?>
</span> </span> <span class="kt_a"> <span class="kt_a_1">
              <input type="radio" name="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="正确" id="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1" style="width:35px;">正确</span><span class="kt_a_1">
              <input type="radio" name="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="错误" id="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
">
              </span><span class="kt_a_1" style="width:35px;">错误</span></span></td>
  </tr>
       <?php endfor; endif; ?>
            <?php endif; ?>
  <tr>
    <td>&nbsp;</td>
  </tr>

    <?php if ($this->_tpl_vars['Explain'] == T): ?>
    <tr>
        <td><span style="width:913px; float:left; padding-left:13px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"> <?php 
              $m++;
              switch($m){
              case "1":
              $n="一";
              break;
              case "2":
              $n="二";
              break;
              case "3":
              $n="三";
              break;
              case "4":
              $n="四";
              break;
              case "5":
              $n="五";
              break;
              case "6":
              $n="六";
              break;
              }
              echo $n;
               ?>、 名词解释题（每题5分，共<?php echo $this->_tpl_vars['Explains']; ?>
题）</span> </td>
    </tr>
    <?php unset($this->_sections['exp_id']);
$this->_sections['exp_id']['name'] = 'exp_id';
$this->_sections['exp_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayExplain']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exp_id']['show'] = true;
$this->_sections['exp_id']['max'] = $this->_sections['exp_id']['loop'];
$this->_sections['exp_id']['step'] = 1;
$this->_sections['exp_id']['start'] = $this->_sections['exp_id']['step'] > 0 ? 0 : $this->_sections['exp_id']['loop']-1;
if ($this->_sections['exp_id']['show']) {
    $this->_sections['exp_id']['total'] = $this->_sections['exp_id']['loop'];
    if ($this->_sections['exp_id']['total'] == 0)
        $this->_sections['exp_id']['show'] = false;
} else
    $this->_sections['exp_id']['total'] = 0;
if ($this->_sections['exp_id']['show']):

            for ($this->_sections['exp_id']['index'] = $this->_sections['exp_id']['start'], $this->_sections['exp_id']['iteration'] = 1;
                 $this->_sections['exp_id']['iteration'] <= $this->_sections['exp_id']['total'];
                 $this->_sections['exp_id']['index'] += $this->_sections['exp_id']['step'], $this->_sections['exp_id']['iteration']++):
$this->_sections['exp_id']['rownum'] = $this->_sections['exp_id']['iteration'];
$this->_sections['exp_id']['index_prev'] = $this->_sections['exp_id']['index'] - $this->_sections['exp_id']['step'];
$this->_sections['exp_id']['index_next'] = $this->_sections['exp_id']['index'] + $this->_sections['exp_id']['step'];
$this->_sections['exp_id']['first']      = ($this->_sections['exp_id']['iteration'] == 1);
$this->_sections['exp_id']['last']       = ($this->_sections['exp_id']['iteration'] == $this->_sections['exp_id']['total']);
?>
    <tr>
        <td><span class="kt"> <span class="kt_t"> <?php 
              $i++;
              echo $i;
               ?>、<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['content']; ?>
 </span> </span> <span style="float:left; padding-left:25px;">
              <textarea name="explain<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['id']; ?>
" id="explain<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['id']; ?>
" style="width:780px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:200px;" rows=""></textarea>
              </span></td>
    </tr>
    <?php endfor; endif; ?>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['Answer'] == T): ?>
  <tr>
    <td><span style="width:913px; float:left; padding-left:13px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"> <?php 
              $m++;
              switch($m){
              case "1":
              $n="一";
              break;
              case "2":
              $n="二";
              break;
              case "3":
              $n="三";
              break;
              case "4":
              $n="四";
              break;
              case "5":
              $n="五";
              break;
              case "6":
              $n="六";
              break;
              }
              echo $n;
               ?>、 简答题（每题5分，共<?php echo $this->_tpl_vars['Answers']; ?>
题）</span> </td>
  </tr>
     <?php unset($this->_sections['ans_id']);
$this->_sections['ans_id']['name'] = 'ans_id';
$this->_sections['ans_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayAnswer']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ans_id']['show'] = true;
$this->_sections['ans_id']['max'] = $this->_sections['ans_id']['loop'];
$this->_sections['ans_id']['step'] = 1;
$this->_sections['ans_id']['start'] = $this->_sections['ans_id']['step'] > 0 ? 0 : $this->_sections['ans_id']['loop']-1;
if ($this->_sections['ans_id']['show']) {
    $this->_sections['ans_id']['total'] = $this->_sections['ans_id']['loop'];
    if ($this->_sections['ans_id']['total'] == 0)
        $this->_sections['ans_id']['show'] = false;
} else
    $this->_sections['ans_id']['total'] = 0;
if ($this->_sections['ans_id']['show']):

            for ($this->_sections['ans_id']['index'] = $this->_sections['ans_id']['start'], $this->_sections['ans_id']['iteration'] = 1;
                 $this->_sections['ans_id']['iteration'] <= $this->_sections['ans_id']['total'];
                 $this->_sections['ans_id']['index'] += $this->_sections['ans_id']['step'], $this->_sections['ans_id']['iteration']++):
$this->_sections['ans_id']['rownum'] = $this->_sections['ans_id']['iteration'];
$this->_sections['ans_id']['index_prev'] = $this->_sections['ans_id']['index'] - $this->_sections['ans_id']['step'];
$this->_sections['ans_id']['index_next'] = $this->_sections['ans_id']['index'] + $this->_sections['ans_id']['step'];
$this->_sections['ans_id']['first']      = ($this->_sections['ans_id']['iteration'] == 1);
$this->_sections['ans_id']['last']       = ($this->_sections['ans_id']['iteration'] == $this->_sections['ans_id']['total']);
?>
  <tr>
    <td><span class="kt"> <span class="kt_t"> <?php 
              $i++;
              echo $i;
               ?>、<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['content']; ?>
 </span> </span> <span style="float:left; padding-left:25px;">
              <textarea name="answer<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['id']; ?>
" id="answer<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['id']; ?>
" style="width:780px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:200px;" rows=""></textarea>
              </span></td>
  </tr>
    <?php endfor; endif; ?>
            <?php endif; ?>
            
            <?php if ($this->_tpl_vars['Discourse'] == T): ?>
  <tr>
    <td><span style="width:913px; float:left; padding-left:13px; line-height:28px;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #FF0000; font-weight:bold;"> <?php 
              $m++;
              switch($m){
              case "1":
              $n="一";
              break;
              case "2":
              $n="二";
              break;
              case "3":
              $n="三";
              break;
              case "4":
              $n="四";
              break;
              case "5":
              $n="五";
              break;
              case "6":
              $n="六";
              break;
              }
              echo $n;
               ?>、 论述题（每题5分，共<?php echo $this->_tpl_vars['Discourses']; ?>
题）</span> </td>
  </tr>
      <?php unset($this->_sections['dis_id']);
$this->_sections['dis_id']['name'] = 'dis_id';
$this->_sections['dis_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayDiscourse']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dis_id']['show'] = true;
$this->_sections['dis_id']['max'] = $this->_sections['dis_id']['loop'];
$this->_sections['dis_id']['step'] = 1;
$this->_sections['dis_id']['start'] = $this->_sections['dis_id']['step'] > 0 ? 0 : $this->_sections['dis_id']['loop']-1;
if ($this->_sections['dis_id']['show']) {
    $this->_sections['dis_id']['total'] = $this->_sections['dis_id']['loop'];
    if ($this->_sections['dis_id']['total'] == 0)
        $this->_sections['dis_id']['show'] = false;
} else
    $this->_sections['dis_id']['total'] = 0;
if ($this->_sections['dis_id']['show']):

            for ($this->_sections['dis_id']['index'] = $this->_sections['dis_id']['start'], $this->_sections['dis_id']['iteration'] = 1;
                 $this->_sections['dis_id']['iteration'] <= $this->_sections['dis_id']['total'];
                 $this->_sections['dis_id']['index'] += $this->_sections['dis_id']['step'], $this->_sections['dis_id']['iteration']++):
$this->_sections['dis_id']['rownum'] = $this->_sections['dis_id']['iteration'];
$this->_sections['dis_id']['index_prev'] = $this->_sections['dis_id']['index'] - $this->_sections['dis_id']['step'];
$this->_sections['dis_id']['index_next'] = $this->_sections['dis_id']['index'] + $this->_sections['dis_id']['step'];
$this->_sections['dis_id']['first']      = ($this->_sections['dis_id']['iteration'] == 1);
$this->_sections['dis_id']['last']       = ($this->_sections['dis_id']['iteration'] == $this->_sections['dis_id']['total']);
?>
  <tr>
    <td><span class="kt"> <span class="kt_t"> <?php 
              $i++;
              echo $i;
               ?>、<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['content']; ?>
</span> </span> <span style="float:left; padding-left:25px;">
              <textarea name="discourse<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['id']; ?>
" style="width:800px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:300px;" id="discourse<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['id']; ?>
" cols="80" rows="15"></textarea>
              </span></td>
  </tr>
     <?php endfor; endif; ?>
            <?php endif; ?>
      </form>
</table>
</body>
</html>