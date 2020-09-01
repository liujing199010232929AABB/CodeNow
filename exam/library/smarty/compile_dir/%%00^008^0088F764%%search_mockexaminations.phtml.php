<?php /* Smarty version 2.6.19, created on 2016-09-28 17:58:36
         compiled from search_mockexaminations.phtml */ ?>
<!--内容开始 -->

<div id="sub">
  <div id="sub_left">
    <div class="left_zl">
      <div class="left_zl_1">
        <div class="left_zl_1_t"><img src="images/63.jpg" alt="" /></div>
        <div class="left_zl_1_c">
          <div class="left_zl_a">
              <div class="left_zl_a_img"><?php if ($_SESSION['picture'] != ''): ?><img src="CoalMine_Backstage/<?php echo $_SESSION['picture']; ?>
" width="145" height="174" alt="" /><?php else: ?><img src="CoalMine_Backstage/upfiles/userface/none.jpg" width="145" height="174" alt="" /><?php endif; ?></div>
          </div>
          <div class="left_zl_a">
            <div class="left_zl_a_b">
              <ul>
                <li><span class="font9">考生姓名：</span><span class="font10">测试账号</span></li>
                <li><span class="font9">考核类型：</span><span class="font10"><?php echo $this->_tpl_vars['pro_class']; ?>
 </span></li>
              </ul>
            </div>
          </div>
          <div class="left_zl_b">
            <ul>
              <li><a href="#radio"><img src="images/61.jpg" alt="" border="0" /></a></li>
              <li><a href="#checkbox"><img src="images/62.jpg" alt="" border="0" /></a></li>
                <li><a href="#judgment"><img src="images/60.jpg" alt="" border="0" /></a></li>
                <li><a href="#explain"><img src="images/602.jpg" alt="" border="0" /></a></li>
                <li><a href="#answer"><img src="images/601.jpg" alt="" border="0" /></a></li>
            </ul>
            <div class="left_zl_xs">&nbsp;&nbsp;<a href="#" onClick="javascript:change(one,type);" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image13','','images/55.jpg',1)"><img src="images/54.jpg" name="Image13" width="92" height="25" border="0" id="Image13" /></a></div>
          </div>
          <script>
          function change(nu,lx){ 
	if(nu.style.display == "none"){ 
		nu.style.display = "";
	}else{ 
		nu.style.display = "none";
	}
}
          </script>
          <div class="left_zl_c" style="display:none" id="one">
            <ul>
              <li><?php echo $this->_tpl_vars['answer']; ?>
</li>
            </ul>
          </div>
        </div>
        <div class="left_zl_1_t"><img src="images/64.jpg" alt="" /></div>
      </div>
    </div>
  </div>
  <div id="sub_right">
    <div class="right">
      <div class="sub_c" style="padding-bottom:20px;">
        <div class="sub_c_bt" style="padding-top:12px; color:#000000; line-height:20px; font-size:14px; font-weight:bold; text-align:center;"><?php echo $this->_tpl_vars['title']; ?>
 <br />
          <span style=" color:#ff6101; font-weight:normal; padding-right:30px; font-size:12px; float:right;" > 成绩：<?php echo $this->_tpl_vars['fraction']; ?>
 分 </span> </div>
        <div class="k_con">
          <ul>
            <li>
              <p> <?php $i=0; ?>            
                <?php $_from = $this->_tpl_vars['pro_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type_id']):
?>
                
                <?php if ($this->_tpl_vars['type_id'] == 'radio'): ?>
            <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 一、 单选题（选择一个正确答案字母）每题2分，共<?php echo $this->_tpl_vars['Radios']; ?>
题</span><a name="radio"></a> </li>
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
$this->_sections['exam_id']['loop'] = is_array($_loop=$this->_tpl_vars['radioproblems']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <?php if ($this->_tpl_vars['examination'][$this->_sections['rad_id']['index']]['0'] == $this->_tpl_vars['radioproblems'][$this->_sections['exam_id']['index']]['id']): ?>
            <li> <span class="kt"> <span class="kt_t"> <?php 
              $i++;
              echo $i;
              echo "<a name=" .$i. "></a>";
              
               ?>、<?php echo $this->_tpl_vars['radioproblems'][$this->_sections['exam_id']['index']]['content']; ?>
</span> </span> <span class="kt_a"> 正确答案：<?php echo $this->_tpl_vars['radioproblems'][$this->_sections['exam_id']['index']]['answer']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;您的答案：<?php echo $this->_tpl_vars['examination'][$this->_sections['rad_id']['index']]['3']; ?>
 </span> <?php if ($this->_tpl_vars['radioproblems'][$this->_sections['exam_id']['index']]['resolve'] != ""): ?> <span class="kt_a"> 问题解析：<?php echo $this->_tpl_vars['radioproblems'][$this->_sections['exam_id']['index']]['resolve']; ?>
 </span> <?php endif; ?> </li>
            <?php endif; ?>
            <?php endfor; endif; ?>
            
            <?php endfor; endif; ?>
            <?php endif; ?>
            
            
            <?php if ($this->_tpl_vars['type_id'] == 'checkbox'): ?>
            <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 二、 多选题（选择两个或两个以上正确答案字母）每题3分，共<?php echo $this->_tpl_vars['Checkboxs']; ?>
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
$this->_sections['exam_id1']['loop'] = is_array($_loop=$this->_tpl_vars['checkboxproblems']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <?php if ($this->_tpl_vars['examination'][$this->_sections['rad_id1']['index']]['0'] == $this->_tpl_vars['checkboxproblems'][$this->_sections['exam_id1']['index']]['id']): ?>
            <li> <span class="kt"> <span class="kt_t"> <?php 
              $i++;
              echo $i;
              echo "<a name=" .$i. "></a>";

               ?>、<?php echo $this->_tpl_vars['checkboxproblems'][$this->_sections['exam_id1']['index']]['content']; ?>
</span> </span> <span class="kt_a"> 正确答案：<?php echo $this->_tpl_vars['checkboxproblems'][$this->_sections['exam_id1']['index']]['answer']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;您的答案：<?php echo $this->_tpl_vars['examination'][$this->_sections['rad_id1']['index']]['3']; ?>
 </span> <?php if ($this->_tpl_vars['checkboxproblems'][$this->_sections['exam_id1']['index']]['resolve'] != ""): ?> <span class="kt_a"> 问题解析：<?php echo $this->_tpl_vars['checkboxproblems'][$this->_sections['exam_id1']['index']]['resolve']; ?>
 </span> <?php endif; ?> </li>
            <?php endif; ?>
            <?php endfor; endif; ?>

            <?php endfor; endif; ?>
            <?php endif; ?>

            <?php if ($this->_tpl_vars['type_id'] == 'fill'): ?>
            <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 三、 填空题（每空1分，共<?php echo $this->_tpl_vars['Fills']; ?>
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
$this->_sections['exam_id2']['loop'] = is_array($_loop=$this->_tpl_vars['fillproblems']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <?php if ($this->_tpl_vars['examination'][$this->_sections['rad_id2']['index']]['0'] == $this->_tpl_vars['fillproblems'][$this->_sections['exam_id2']['index']]['id']): ?>
            <li> <span class="kt"> <span class="kt_t"> <?php 
              $i++;
              echo $i;
              echo "<a name=" .$i. "></a>";

               ?>、<?php echo $this->_tpl_vars['fillproblems'][$this->_sections['exam_id2']['index']]['content']; ?>
</span> </span> <span class="kt_a"> 正确答案：<?php echo $this->_tpl_vars['fillproblems'][$this->_sections['exam_id2']['index']]['answer']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;您的答案：<?php echo $this->_tpl_vars['examination'][$this->_sections['rad_id2']['index']]['3']; ?>
 </span> <?php if ($this->_tpl_vars['fillproblems'][$this->_sections['exam_id2']['index']]['resolve'] != ""): ?> <span class="kt_a"> 问题解析：<?php echo $this->_tpl_vars['fillproblems'][$this->_sections['exam_id2']['index']]['resolve']; ?>
 </span> <?php endif; ?> </li>
            <?php endif; ?>
            <?php endfor; endif; ?>

            <?php endfor; endif; ?>
            <?php endif; ?>

            <?php if ($this->_tpl_vars['type_id'] == 'judgment'): ?>
            <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 四、 判断题（正确的选正确；错误的选错误）每题5分，共<?php echo $this->_tpl_vars['Judgments']; ?>
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
$this->_sections['exam_id3']['loop'] = is_array($_loop=$this->_tpl_vars['judgmentproblems']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <?php if ($this->_tpl_vars['examination'][$this->_sections['rad_id3']['index']]['0'] == $this->_tpl_vars['judgmentproblems'][$this->_sections['exam_id3']['index']]['id']): ?>
            <li> <span class="kt"> <span class="kt_t"> <?php 
              $i++;
              echo $i;
              echo "<a name=" .$i. "></a>";

               ?>、<?php echo $this->_tpl_vars['judgmentproblems'][$this->_sections['exam_id3']['index']]['content']; ?>
</span> </span> <span class="kt_a"> 正确答案：<?php echo $this->_tpl_vars['judgmentproblems'][$this->_sections['exam_id3']['index']]['answer']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;您的答案：<?php echo $this->_tpl_vars['examination'][$this->_sections['rad_id3']['index']]['3']; ?>
 </span> <?php if ($this->_tpl_vars['judgmentproblems'][$this->_sections['exam_id3']['index']]['resolve'] != ""): ?> <span class="kt_a"> 问题解析：<?php echo $this->_tpl_vars['judgmentproblems'][$this->_sections['exam_id3']['index']]['resolve']; ?>
 </span> <?php endif; ?> </li>
            <?php endif; ?>
            <?php endfor; endif; ?>

            <?php endfor; endif; ?>

            <?php endif; ?>
              <p><?php if ($this->_tpl_vars['type_id'] == 'explain'): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 五、 名词解释题（每题2分，共<?php echo $this->_tpl_vars['Explains']; ?>
题）</span><a name="explain"></a> </li>
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
              <li> <span class="kt"> <span class="kt_t" style="word-wrap: break-word;"> <?php 
              $i++;
              echo $i;
              echo "<a name=" .$i. "></a>";

               ?>、
              <?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id4']['index']]['content']; ?>
</span> </span> <span class="kt_a"> 正确答案：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id4']['index']]['answer']; ?>
<br>您的答案：<?php echo $this->_tpl_vars['examination'][$this->_sections['rad_id4']['index']]['3']; ?>
 </span> <br><?php if ($this->_tpl_vars['tb_exam'][$this->_sections['exam_id4']['index']]['resolve'] != ""): ?> <span class="kt_a"> 问题解析：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id4']['index']]['resolve']; ?>
 </span> <?php endif; ?> </li>
              <?php endif; ?>
              <?php endfor; endif; ?>

              <?php endfor; endif; ?>

              <?php endif; ?>

              <p><?php if ($this->_tpl_vars['type_id'] == 'answer'): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 六、 问答题（每题5分，共<?php echo $this->_tpl_vars['Answers']; ?>
题）</span><a name="answer"></a> </li>
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
              <li> <span class="kt"> <span class="kt_t" style="word-wrap: break-word;"> <?php 
              $i++;
              echo $i;
              echo "<a name=" .$i. "></a>";

               ?>、
              <?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id5']['index']]['content']; ?>
</span> </span> <span class="kt_a"> 正确答案：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id5']['index']]['answer']; ?>
<br>您的答案：<?php echo $this->_tpl_vars['examination'][$this->_sections['rad_id5']['index']]['3']; ?>
 </span><br> <?php if ($this->_tpl_vars['tb_exam'][$this->_sections['exam_id5']['index']]['resolve'] != ""): ?> <span class="kt_a"> 问题解析：<?php echo $this->_tpl_vars['tb_exam'][$this->_sections['exam_id5']['index']]['resolve']; ?>
 </span> <?php endif; ?> </li>
              <?php endif; ?>
              <?php endfor; endif; ?>

              <?php endfor; endif; ?>

              <?php endif; ?>
            
            <?php endforeach; endif; unset($_from); ?>
            </p>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--内容结束 --> 