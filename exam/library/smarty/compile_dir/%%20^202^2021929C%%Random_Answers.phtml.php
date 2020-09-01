<?php /* Smarty version 2.6.19, created on 2013-11-01 16:46:31
         compiled from Random_Answers.phtml */ ?>
<script src="Scripts/Random_Answer.js" type="text/javascript"></script>

<!--内容开始 -->
	<div id="sub">
    	<div id="sub_left">
        	<div class="left_fl">
            	<div class="left_fl_bt"><img src="images/38.jpg" alt="" /></div>
                <div class="left_fl_con">
                	<div id="PARENT">
  <ul id="left_fl_con1">
  <?php 
  $i=0;
   ?>
  <?php unset($this->_sections['type_id']);
$this->_sections['type_id']['name'] = 'type_id';
$this->_sections['type_id']['loop'] = is_array($_loop=$this->_tpl_vars['typeNames']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['type_id']['show'] = true;
$this->_sections['type_id']['max'] = $this->_sections['type_id']['loop'];
$this->_sections['type_id']['step'] = 1;
$this->_sections['type_id']['start'] = $this->_sections['type_id']['step'] > 0 ? 0 : $this->_sections['type_id']['loop']-1;
if ($this->_sections['type_id']['show']) {
    $this->_sections['type_id']['total'] = $this->_sections['type_id']['loop'];
    if ($this->_sections['type_id']['total'] == 0)
        $this->_sections['type_id']['show'] = false;
} else
    $this->_sections['type_id']['total'] = 0;
if ($this->_sections['type_id']['show']):

            for ($this->_sections['type_id']['index'] = $this->_sections['type_id']['start'], $this->_sections['type_id']['iteration'] = 1;
                 $this->_sections['type_id']['iteration'] <= $this->_sections['type_id']['total'];
                 $this->_sections['type_id']['index'] += $this->_sections['type_id']['step'], $this->_sections['type_id']['iteration']++):
$this->_sections['type_id']['rownum'] = $this->_sections['type_id']['iteration'];
$this->_sections['type_id']['index_prev'] = $this->_sections['type_id']['index'] - $this->_sections['type_id']['step'];
$this->_sections['type_id']['index_next'] = $this->_sections['type_id']['index'] + $this->_sections['type_id']['step'];
$this->_sections['type_id']['first']      = ($this->_sections['type_id']['iteration'] == 1);
$this->_sections['type_id']['last']       = ($this->_sections['type_id']['iteration'] == $this->_sections['type_id']['total']);
?>
   <?php  $i++;  ?>
    <li><a href="Random_Answer.php?type_id=<?php echo $this->_tpl_vars['type_id']; ?>
&exam_id=<?php echo $this->_tpl_vars['exam_id']; ?>
" onClick="DoMenu('ChildMenu<?php  echo $i;  ?>')"><?php echo $this->_tpl_vars['typeNames'][$this->_sections['type_id']['index']]['typename']; ?>
</a>
      <ul id="ChildMenu<?php  echo $i;  ?>" class="collapsed">
       <?php unset($this->_sections['exam_id']);
$this->_sections['exam_id']['name'] = 'exam_id';
$this->_sections['exam_id']['loop'] = is_array($_loop=$this->_tpl_vars['examTypes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <li><a href="Random_Answer.php?type_id=<?php echo $this->_tpl_vars['typeNames'][$this->_sections['type_id']['index']]['id']; ?>
&exam_id=<?php echo $this->_tpl_vars['examTypes'][$this->_sections['exam_id']['index']]['english']; ?>
"><?php echo $this->_tpl_vars['examTypes'][$this->_sections['exam_id']['index']]['chinese']; ?>
</a></li>
       <?php endfor; endif; ?>
      </ul>
    </li>
   <?php endfor; endif; ?>
       
  </ul>
</div>
                </div>
            </div>
        </div>
        <div id="sub_right">
        <form name="form_addbccdinfo" method="post" >
      <div class="right">
        <div class="sub_c" style="padding-bottom:20px;">
          <div class="sub_c_bt" style="padding-top:12px; color:#000000; line-height:48px; font-size:48px; font-weight:bold; text-align:center;"><?php echo $this->_tpl_vars['pro_class']; ?>
  随机问答<a name="radio"></a></div>
          <div class="k_con">
            <ul>
              <li> <?php 
                $i=0;
            
                 ?>
                <p><?php if ($this->_tpl_vars['Radio'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;font-size: 48px;">
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
              <li> <span class="kt"> <span class="kt_t" style="font-size: 68px;line-height: 68px;">   <?php 
                $i++;
                echo $i;
                echo "<a name=" .$i. "></a>";
              
                 ?>、
                <?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['content']; ?>
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
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">A</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">B</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">C</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="D" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">D</span>
                  <?php elseif ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 3): ?> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">A</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">B</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">C</span> <?php else: ?> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">A</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:22px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">B</span> <?php endif; ?> </span> </li>
             <?php if ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['right_error'] != ""): ?>   
                <li> <span style="width:660px; float:left; padding-left:13px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; margin-top:40px;display:inline; border:1px solid #19b10a; font-weight:bold;font-size: 68px;">正确答案：<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['answer']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;您的答案：<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['sub']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['right_error']; ?>
</span>
                 <?php if ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['resolve'] != ""): ?>
                <br>问题解析：<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['resolve']; ?>

                <?php endif; ?>
                </li>
              <?php endif; ?>
              
              <?php endfor; endif; ?>
              <?php endif; ?>
              
              
              <?php if ($this->_tpl_vars['Checkbox'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;font-size: 48px;">
              随机问答： 多选题（选择两个或两个以上正确答案字母）每题<?php echo $this->_tpl_vars['checkboxFraction']; ?>
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
              <li> <span class="kt"> <span class="kt_t" style="font-size: 68px;line-height: 68px;"> <?php 
                $i++;
                echo $i;
                echo "<a name=" .$i. "></a>";
                 ?>、
                
                <?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['content']; ?>
</span> </span> <span class="kt_a">
                  <?php if ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 8): ?> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">A</span> <span class="kt_a_1">
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
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">A</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">B</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">C</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">D</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">E</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">F</span>
                  <?php elseif ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 5): ?> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">A</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">B</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">C</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">D</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">E</span> <?php else: ?> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">A</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">B</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">C</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:22px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="font-size: 68px;line-height: 68px;">D</span> <?php endif; ?> </span> </li>
                 <?php if ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['right_error'] != ""): ?>
                <li> <span style="width:660px; float:left; padding-left:13px; margin-top: 30px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;font-size: 68px;line-height: 68px;">正确答案：<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['answer']; ?>
<br>您的答案：<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['sub']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['right_error']; ?>

                <?php if ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['resolve'] != ""): ?>
                <br>问题解析：<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['resolve']; ?>

                <?php endif; ?>
                </span></li>
                <?php endif; ?>
              <?php endfor; endif; ?>
              <?php endif; ?>
              
              <?php if ($this->_tpl_vars['Fill'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px;background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;font-size: 48px;"> 随机问答： 填空题（每空<?php echo $this->_tpl_vars['fillFraction']; ?>
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
              <li> <span class="kt" style="background-color:#FFFFFF; border:1px dashed #FF6600; color:#333333;"> <span style="padding-top:4px; float:left;font-size: 68px;line-height: 68px;"> <?php 
         
                $i++;
                echo $i;
                     echo "<a name=" .$i. "></a>";
                 ?>、
               
            <?php echo $this->_reg_objects['util'][0]->mreplace($this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['content'],$this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['id']);?>

             
              </span> </span></li>
                 <?php if ($this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['right_error'] != ""): ?>
                 <li> <span style="width:660px; float:left; padding-left:13px; background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;font-size: 68px;margin-top: 30px;">正确答案：<?php echo $this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['answer']; ?>
<br>您的答案：<?php echo $this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['sub']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['right_error']; ?>

                   <?php if ($this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['resolve'] != ""): ?>
                <br>问题解析：<?php echo $this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['resolve']; ?>

                <?php endif; ?>
                 </span></li>
                 <?php endif; ?>
              <?php endfor; endif; ?>
              <?php endif; ?>
              
              <?php if ($this->_tpl_vars['Judgment'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;font-size: 48px;"> 随机问答： 判断题 每题<?php echo $this->_tpl_vars['judgmentFraction']; ?>
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
?>
              <li> <span class="kt"> <span class="kt_t" style="font-size: 68px;line-height: 68px;"> <?php 
            
                $i++;
                echo $i;
                  echo "<a name=" .$i. "></a>";
                 ?>、
                <?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['content']; ?>
</span> </span> 
                <!--  <span class="kt_a">
            
                        <span class="kt_a_2">A.接口是一种用来定义程序的协议</span>                    </span>--> 
                <span class="kt_a" style="margin-top: 30px;"> <span class="kt_a_1">
                <input type="radio" name="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="正确" id="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="width:185px;font-size: 68px;">正确</span><span class="kt_a_1">
                <input type="radio" name="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="错误" id="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="width:185px;font-size: 68px;">错误</span></span></li>
                    <?php if ($this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['right_error'] != ""): ?>
                 <li> <span style="width:660px; float:left; padding-left:13px;  background-color:#ffffff;  color:#000000; margin-bottom:5px;margin-top: 22px; display:inline; border:1px solid #19b10a; font-weight:bold;font-size: 48px;">正确答案：<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['answer']; ?>
<br>您的答案：<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['sub']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['right_error']; ?>

                   <?php if ($this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['resolve'] != ""): ?>
                <br>问题解析：<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['resolve']; ?>

                <?php endif; ?>
                 </span></li>
                 <?php endif; ?>
              <?php endfor; endif; ?>
              <?php endif; ?>
              </p>
              <p> </p>
              <p><?php if ($this->_tpl_vars['Answer'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 随机问答： 简答题（每题<?php echo $this->_tpl_vars['answerFraction']; ?>
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
?>
              <li> <span class="kt"> <span class="kt_t"> <?php 
            
                $i++;
                echo $i;
                  echo "<a name=" .$i. "></a>";
                 ?>、
                <?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['content']; ?>
 </span> </span> <span style="float:left; padding-left:25px;">
                <textarea name="answer<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['id']; ?>
" id="answer<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['id']; ?>
" style="width:630px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:200px;" cols="" rows=""></textarea>
                </span> </li>
                <?php if ($this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['right_error'] != ""): ?>
                <li> <span style="width:660px; float:left; padding-left:13px; padding-right:10px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; ">正确答案：<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['answer']; ?>

                </span></li>
                
                <li> <span style="width:660px; float:left; padding-left:13px; padding-right:10px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; ">您的答案：<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['sub']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['right_error']; ?>

                  <?php if ($this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['resolve'] != ""): ?>
                <br>问题解析：<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['resolve']; ?>

                <?php endif; ?>
                </span></li>
                
                
                
                <?php endif; ?>
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
                     <?php if ($this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['right_error'] != ""): ?>
                    <li> <span style="width:660px; float:left; padding-left:13px; padding-right:10px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; ">正确答案：<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['answer']; ?>
</span></li>
                    <li> <span style="width:660px; float:left; padding-left:13px; padding-right:10px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; ">您的答案：<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['sub']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['right_error']; ?>

                      <?php if ($this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['resolve'] != ""): ?>
                <br>问题解析：<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['resolve']; ?>

                <?php endif; ?>
                    </span></li>

                    <?php endif; ?>
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
        </div>
        <div style="text-align: center;margin-bottom: 20px;"> <a href="Random_Answer.php?type_id=<?php echo $this->_tpl_vars['type_id']; ?>
&exam_id=<?php echo $this->_tpl_vars['exam_id']; ?>
"><img src="images/xyt.jpg" /> </a></div>
      </div>
    	</form>
    </div>
    </div>
<!--内容结束 -->