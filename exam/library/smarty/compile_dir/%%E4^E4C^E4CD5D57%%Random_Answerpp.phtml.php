<?php /* Smarty version 2.6.19, created on 2016-11-30 18:01:33
         compiled from Random_Answerpp.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'calStyle', 'Random_Answerpp.phtml', 26, false),array('function', 'delbr', 'Random_Answerpp.phtml', 31, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> ==========煤矿=============</title>
    <link href="css/base.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--内容开始 -->
	<div style="background-color: #fff;width: 1259px;margin-left: auto;margin-right: auto;">

        <div id="sub_right">
        <?php if ($this->_tpl_vars['Random'] == 'T'): ?>
        <form name="form_addbccdinfo" method="post" action="Random_Answerspp.php" >
      <div class="right1">
        <div class="sub_c" style="padding-bottom:20px;">
          <div class="sub_c_bt1" style="padding-top:32px; color:#000000; line-height:20px; font-size:48px; line-height:48px;font-weight:bold; text-align:center;"><?php echo $this->_tpl_vars['pro_class']; ?>
  随机问答<a name="radio"></a></div>
          <div class="k_con">
            <ul>
              <li>
                <p><?php if ($this->_tpl_vars['Radio'] == T): ?>
              <li> <span style="width:1180px; float:left; padding-left:5px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;font-size: 48px;">
            随机问答： 单选题（选择一个正确答案字母）每题<?php echo $this->_tpl_vars['radioFraction']; ?>
分</span></li>
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
              <?php $this->assign('ss', $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['content']); ?><?php echo calStyle(array('str' => $this->_tpl_vars['ss']), $this);?>

              <li> <span class="kt1"> <span style="font-size: <?php echo $this->_tpl_vars['size']; ?>
line-height: <?php echo $this->_tpl_vars['size']; ?>
">

                  <audio src='' controls autoplay id='' style='display: none'></audio>
                  <a href="javascript:void(0);" onclick="playSound('<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['sound']; ?>
')"><img src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/images/sound.png" /> </a>
                <?php echo delbr(array('str' => $this->_tpl_vars['ss']), $this);?>
</span> </span> <span class="kt_a1" style="padding-top: 55px;">
                  <?php if ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 6): ?> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="D" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">D</span><span class="kt_a_1">
                  <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="E" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">E</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="F" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">F</span>
                  <?php elseif ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 5): ?> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="D" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">D</span><span class="kt_a_1">
                  <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="E" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                  </span><span class="kt_a_1">E</span>
                  <?php elseif ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 4): ?> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">A</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">B</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">C</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="D" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">D</span>
                  <?php elseif ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 3): ?> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">A</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">B</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">C</span> <?php else: ?> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">A</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">B</span> <?php endif; ?> </span> </li>
            
              
              <?php endfor; endif; ?>
              <?php endif; ?>
              
              
              <?php if ($this->_tpl_vars['Checkbox'] == T): ?>
              <li> <span style="width:1180px; float:left; padding-left:5px; background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;font-size: 48px;">
              随机问答： 多选题  每题<?php echo $this->_tpl_vars['checkboxFraction']; ?>
分</span></li>
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
              <?php $this->assign('ss', $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['content']); ?><?php echo calStyle(array('str' => $this->_tpl_vars['ss']), $this);?>

              <li> <span class="kt1"> <span  style="font-size: <?php echo $this->_tpl_vars['size']; ?>
line-height: <?php echo $this->_tpl_vars['size']; ?>
">

                  <audio src='' controls autoplay id='' style='display: none'></audio>
                  <a href="javascript:void(0);" onclick="playSound('<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['sound']; ?>
')"><img src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/images/sound.png" /> </a>
                <?php echo delbr(array('str' => $this->_tpl_vars['ss']), $this);?>
</span> </span> <span class="kt_a1" style="padding-top: 30px;">
                  <?php if ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 8): ?> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">D</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">E</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">F</span><span class="kt_a_1">
                  <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="G" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">G</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="H" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">H</span>
                  <?php elseif ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 7): ?> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">A</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">B</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">C</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">D</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">E</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">F</span><span class="kt_a_1">
                  <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="G" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                  </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">G</span>
                  <?php elseif ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 6): ?> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">A</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">B</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">C</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">D</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">E</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">F</span>
                  <?php elseif ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 5): ?> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">A</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">B</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">C</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">D</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">E</span> <?php else: ?> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">A</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">B</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">C</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:12px; margin-top:22px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 48px;line-height: 48px;">D</span> <?php endif; ?> </span> </li>
               
              <?php endfor; endif; ?>
              <?php endif; ?>
              
              <?php if ($this->_tpl_vars['Fill'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;font-size: 32px;"> 随机问答： 填空题（每空<?php echo $this->_tpl_vars['fillFraction']; ?>
分）</span></li>
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
              <li> <span class="kt" style="background-color:#FFFFFF; border:1px dashed #FF6600; color:#333333;"> <span style="padding-top:4px; float:left;font-size: 68px;line-height: 68px;">
            <?php echo $this->_reg_objects['util'][0]->mreplace($this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['content'],$this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['id']);?>

             
              </span> </span></li>
              <?php endfor; endif; ?>
              <?php endif; ?>
              
              <?php if ($this->_tpl_vars['Judgment'] == T): ?>
              <li> <span style="width:1180px; float:left; padding-left:5px; font-size: 48px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 随机问答： 判断题 每题<?php echo $this->_tpl_vars['judgmentFraction']; ?>
分</span> </li>
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
?><?php echo calStyle(array('str' => $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['content'],'t' => 'text'), $this);?>

              <li> <span class="kt1"> <span  style="font-size: <?php echo $this->_tpl_vars['size']; ?>
line-height: <?php echo $this->_tpl_vars['size']; ?>
">
                  <audio src='' controls autoplay id='' style='display: none'></audio>
                  <a href="javascript:void(0);" onclick="playSound('<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['sound']; ?>
')"><img src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/images/sound.png" /> </a>
                <?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['content']; ?>
</span> </span> 
                <!--  <span class="kt_a">
            
                        <span class="kt_a_2">A.接口是一种用来定义程序的协议</span>                    </span>--> 
                <span class="kt_a"  style="margin-top: 30px;"> <span class="kt_a_1">
                <input type="radio" name="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="正确" id="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="width:185px;font-size: 68px;line-height: 68px;">正确</span><span class="kt_a_1">
                <input type="radio" name="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="错误" id="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="width:185px;font-size: 68px;line-height: 68px;">错误</span></span></li>
                   
              <?php endfor; endif; ?>
              <?php endif; ?>
              </p>
              <p> </p>
              <p>
                  <?php if ($this->_tpl_vars['Explain'] == T): ?>
                <li> <span style="width:1180px; float:left; padding-left:5px; font-size: 48px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 随机问答： 名词解释题（每题<?php echo $this->_tpl_vars['explainFraction']; ?>
分，共<?php echo $this->_tpl_vars['Explains']; ?>
题）</span></li>
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
?><?php echo calStyle(array('str' => $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['content'],'t' => 'text'), $this);?>

                <li> <span class="kt1"> <span style="font-size: <?php echo $this->_tpl_vars['size']; ?>
line-height: <?php echo $this->_tpl_vars['size']; ?>
">
                    <audio src='' controls autoplay id='' style='display: none'></audio>
                  <a href="javascript:void(0);" onclick="playSound('<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['sound']; ?>
')"><img src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/images/sound.png" /> </a>
                <?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['content']; ?>
 </span> </span> <span style="float:left; padding-left:25px;">
                <textarea name="explain<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['id']; ?>
" id="explain<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['id']; ?>
" style="width:630px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:200px;" cols="" rows=""></textarea>
                </span> </li>
                <?php endfor; endif; ?>
                <?php endif; ?>

                  <?php if ($this->_tpl_vars['Answer'] == T): ?>
              <li> <span style="width:1180px; float:left; padding-left:5px; font-size: 48px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 随机问答： 问答题（每题<?php echo $this->_tpl_vars['answerFraction']; ?>
分，共<?php echo $this->_tpl_vars['Answers']; ?>
题）</span></li>
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
?><?php echo calStyle(array('str' => $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['content'],'t' => 'text'), $this);?>

              <li> <span class="kt1"> <span style="font-size: <?php echo $this->_tpl_vars['size']; ?>
line-height: <?php echo $this->_tpl_vars['size']; ?>
 word-wrap: break-word;">
                  <audio src='' controls autoplay id='' style='display: none'></audio>
                  <a href="javascript:void(0);" onclick="playSound('<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['sound']; ?>
')"><img src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/images/sound.png" /> </a>
                <?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['content']; ?>
 </span> </span> <span style="float:left; padding-left:25px;">
                <textarea name="answer<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['id']; ?>
" id="answer<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['id']; ?>
" style="width:630px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:200px;" cols="" rows=""></textarea>
                </span> </li>
              
              <?php endfor; endif; ?>
              <?php endif; ?>
              
              <?php if ($this->_tpl_vars['Discourse'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px; background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 随机问答： 论述题（每题<?php echo $this->_tpl_vars['discourseFraction']; ?>
分，共<?php echo $this->_tpl_vars['Discourses']; ?>
题）</span></li>
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
              <li> <span class="kt"> <span class="kt_t"> <?php 
           
                $i++;
                echo $i;
                   echo "<a name=" .$i. "></a>";
                 ?>、
                <?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['content']; ?>
</span> </span> <span style="float:left; padding-left:25px;">
                <textarea name="discourse<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['id']; ?>
" style="width:630px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:300px;" id="discourse<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['id']; ?>
" rows="15"></textarea>
                </span></li>
                
              <?php endfor; endif; ?>
              <?php endif; ?>
            </ul>
          </div>
          <div class="k_x"><a name="judgment"></a>
            <input type="hidden" name="type_id" id="type_id" value="<?php echo $this->_tpl_vars['type_id']; ?>
" />
            <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $this->_tpl_vars['exam_id']; ?>
" />
            <input type="hidden" name="arrayValue" id="arrayValue" value="<?php echo $this->_tpl_vars['arrayValue']; ?>
" />
          </div>
          <span style="padding-left: 250px;"><input type="image" name="submit" id="submit" src="images/gbda.jpg" style="margin-left: 250px;"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="Random_Answerpp.php?type_id=<?php echo $this->_tpl_vars['type_id']; ?>
&exam_id=<?php echo $this->_tpl_vars['exam_id']; ?>
"><img src="images/xyt.jpg" /> </a></span>
        </div>

      </div>
    	</form>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['Random'] == 'F'): ?>
        <div class="right">
       <img src="images/none3.jpg" alt="" />
        </div>
        <?php endif; ?>
    </div>
    </div>
<!--内容结束 -->
</body>
</html>