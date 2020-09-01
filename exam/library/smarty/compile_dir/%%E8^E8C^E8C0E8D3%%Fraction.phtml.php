<?php /* Smarty version 2.6.19, created on 2012-09-03 10:46:06
         compiled from Fraction.phtml */ ?>
<script src="Scripts/Random_Answer.js" type="text/javascript"></script>
<!--内容开始 -->

<div id="sub">
  <div id="sub_left">
    <div class="left_fl">
      <div class="left_fl_bt"><img src="images/384.jpg" alt="" /></div>
      <div id="PARENT">
        <ul id="left_fl_con1">
          <?php unset($this->_sections['exa_id']);
$this->_sections['exa_id']['name'] = 'exa_id';
$this->_sections['exa_id']['loop'] = is_array($_loop=$this->_tpl_vars['Examination']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exa_id']['show'] = true;
$this->_sections['exa_id']['max'] = $this->_sections['exa_id']['loop'];
$this->_sections['exa_id']['step'] = 1;
$this->_sections['exa_id']['start'] = $this->_sections['exa_id']['step'] > 0 ? 0 : $this->_sections['exa_id']['loop']-1;
if ($this->_sections['exa_id']['show']) {
    $this->_sections['exa_id']['total'] = $this->_sections['exa_id']['loop'];
    if ($this->_sections['exa_id']['total'] == 0)
        $this->_sections['exa_id']['show'] = false;
} else
    $this->_sections['exa_id']['total'] = 0;
if ($this->_sections['exa_id']['show']):

            for ($this->_sections['exa_id']['index'] = $this->_sections['exa_id']['start'], $this->_sections['exa_id']['iteration'] = 1;
                 $this->_sections['exa_id']['iteration'] <= $this->_sections['exa_id']['total'];
                 $this->_sections['exa_id']['index'] += $this->_sections['exa_id']['step'], $this->_sections['exa_id']['iteration']++):
$this->_sections['exa_id']['rownum'] = $this->_sections['exa_id']['iteration'];
$this->_sections['exa_id']['index_prev'] = $this->_sections['exa_id']['index'] - $this->_sections['exa_id']['step'];
$this->_sections['exa_id']['index_next'] = $this->_sections['exa_id']['index'] + $this->_sections['exa_id']['step'];
$this->_sections['exa_id']['first']      = ($this->_sections['exa_id']['iteration'] == 1);
$this->_sections['exa_id']['last']       = ($this->_sections['exa_id']['iteration'] == $this->_sections['exa_id']['total']);
?>
          <li><a href="Fraction.php?fra_id=<?php echo $this->_tpl_vars['Examination'][$this->_sections['exa_id']['index']]['id']; ?>
&exa_title=<?php echo $this->_tpl_vars['Examination'][$this->_sections['exa_id']['index']]['title']; ?>
" title="<?php echo $this->_tpl_vars['Examination'][$this->_sections['exa_id']['index']]['title']; ?>
"><?php echo $this->_reg_objects['util'][0]->msubstr($this->_tpl_vars['Examination'][$this->_sections['exa_id']['index']]['title'],0,20,"...");?>
</a> </li>
          <?php endfor; endif; ?>
        </ul>
      </div>
    </div>
    <!-- <div style="line-height:8;">&nbsp;</div>
    <div class="left_fl">
      <div class="left_fl_bt"><img src="images/38.jpg" alt="" /></div>
      <div id="PARENT">
        <ul id="left_fl_con1">
          <?php unset($this->_sections['bul_id']);
$this->_sections['bul_id']['name'] = 'bul_id';
$this->_sections['bul_id']['loop'] = is_array($_loop=$this->_tpl_vars['Bulletins']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['bul_id']['show'] = true;
$this->_sections['bul_id']['max'] = $this->_sections['bul_id']['loop'];
$this->_sections['bul_id']['step'] = 1;
$this->_sections['bul_id']['start'] = $this->_sections['bul_id']['step'] > 0 ? 0 : $this->_sections['bul_id']['loop']-1;
if ($this->_sections['bul_id']['show']) {
    $this->_sections['bul_id']['total'] = $this->_sections['bul_id']['loop'];
    if ($this->_sections['bul_id']['total'] == 0)
        $this->_sections['bul_id']['show'] = false;
} else
    $this->_sections['bul_id']['total'] = 0;
if ($this->_sections['bul_id']['show']):

            for ($this->_sections['bul_id']['index'] = $this->_sections['bul_id']['start'], $this->_sections['bul_id']['iteration'] = 1;
                 $this->_sections['bul_id']['iteration'] <= $this->_sections['bul_id']['total'];
                 $this->_sections['bul_id']['index'] += $this->_sections['bul_id']['step'], $this->_sections['bul_id']['iteration']++):
$this->_sections['bul_id']['rownum'] = $this->_sections['bul_id']['iteration'];
$this->_sections['bul_id']['index_prev'] = $this->_sections['bul_id']['index'] - $this->_sections['bul_id']['step'];
$this->_sections['bul_id']['index_next'] = $this->_sections['bul_id']['index'] + $this->_sections['bul_id']['step'];
$this->_sections['bul_id']['first']      = ($this->_sections['bul_id']['iteration'] == 1);
$this->_sections['bul_id']['last']       = ($this->_sections['bul_id']['iteration'] == $this->_sections['bul_id']['total']);
?>
          <li><a href="News_Bulletin.php?bulletin_id=<?php echo $this->_tpl_vars['Bulletins'][$this->_sections['bul_id']['index']]['id']; ?>
&new_bulletin=公告" title="<?php echo $this->_tpl_vars['Bulletins'][$this->_sections['bul_id']['index']]['title']; ?>
"><?php echo $this->_reg_objects['util'][0]->msubstr($this->_tpl_vars['Bulletins'][$this->_sections['bul_id']['index']]['title'],0,18,"...");?>
</a> </li>
          <?php endfor; endif; ?>
        </ul>
      </div>
    </div>--> 
  </div>
  <?php if ($this->_tpl_vars['Fraction']['data'] != false): ?>
  <div id="sub_right">
    <div class="right">
      <div class="right_bt"><?php echo $this->_reg_objects['util'][0]->msubstr($_GET['exa_title'],0,48,"...");?>
</div>
      <div class="right_con">
        <div class="right_con_text">
          <div style="width:100%; height:20px; background-color:#EDEFE3; text-align:center;">
            <ul>
              <li style="width:18%; height:20px; line-height:20px; float:left; border-left: 1px solid #0A8DA5;">ID</li>
              <li style="width:20%; height:20px; line-height:20px; float:left; border-right: 1px solid #0A8DA5;">姓名</li>
              <li style="width:20%; height:20px; line-height:20px; float:left; border-right: 1px solid #0A8DA5;">工种</li>
              <li style="width:18%; height:20px; line-height:20px; float:left; border-right: 1px solid #0A8DA5;">成绩</li>
              <li style="width:20%; height:20px; line-height:20px; float:right; border-right: 1px solid #0A8DA5;">考试时间</li>
            </ul>
          </div>
          <?php unset($this->_sections['fra_id']);
$this->_sections['fra_id']['name'] = 'fra_id';
$this->_sections['fra_id']['loop'] = is_array($_loop=$this->_tpl_vars['Fraction']['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['fra_id']['show'] = true;
$this->_sections['fra_id']['max'] = $this->_sections['fra_id']['loop'];
$this->_sections['fra_id']['step'] = 1;
$this->_sections['fra_id']['start'] = $this->_sections['fra_id']['step'] > 0 ? 0 : $this->_sections['fra_id']['loop']-1;
if ($this->_sections['fra_id']['show']) {
    $this->_sections['fra_id']['total'] = $this->_sections['fra_id']['loop'];
    if ($this->_sections['fra_id']['total'] == 0)
        $this->_sections['fra_id']['show'] = false;
} else
    $this->_sections['fra_id']['total'] = 0;
if ($this->_sections['fra_id']['show']):

            for ($this->_sections['fra_id']['index'] = $this->_sections['fra_id']['start'], $this->_sections['fra_id']['iteration'] = 1;
                 $this->_sections['fra_id']['iteration'] <= $this->_sections['fra_id']['total'];
                 $this->_sections['fra_id']['index'] += $this->_sections['fra_id']['step'], $this->_sections['fra_id']['iteration']++):
$this->_sections['fra_id']['rownum'] = $this->_sections['fra_id']['iteration'];
$this->_sections['fra_id']['index_prev'] = $this->_sections['fra_id']['index'] - $this->_sections['fra_id']['step'];
$this->_sections['fra_id']['index_next'] = $this->_sections['fra_id']['index'] + $this->_sections['fra_id']['step'];
$this->_sections['fra_id']['first']      = ($this->_sections['fra_id']['iteration'] == 1);
$this->_sections['fra_id']['last']       = ($this->_sections['fra_id']['iteration'] == $this->_sections['fra_id']['total']);
?>
          <div style="width:100%; height:20px; border-top: 1px solid #0A8DA5; text-align:center; ">
            <ul>
              <li style="width:18%; height:20px; line-height:20px; float:left; border-left: 1px solid #0A8DA5;"> <?php echo $this->_tpl_vars['Fraction']['data'][$this->_sections['fra_id']['index']]['id']; ?>
 </li>
              <li style="width:20%; height:20px; line-height:20px; float:left; border-right: 1px solid #0A8DA5;"><?php echo $this->_tpl_vars['Fraction']['data'][$this->_sections['fra_id']['index']]['name']; ?>
</li>
              <li style="width:20%; height:20px; line-height:20px; float:left; border-right: 1px solid #0A8DA5;"><?php echo $this->_tpl_vars['Fraction']['data'][$this->_sections['fra_id']['index']]['pro_class']; ?>
</li>
              <li style="width:18%; height:20px; line-height:20px; float:left; border-right: 1px solid #0A8DA5;"><?php echo $this->_tpl_vars['Fraction']['data'][$this->_sections['fra_id']['index']]['fraction']; ?>
</li>
              <li style="width:20%; height:20px; line-height:20px; float:right; border-right: 1px solid #0A8DA5;"><?php echo $this->_tpl_vars['Fraction']['data'][$this->_sections['fra_id']['index']]['sub_time']; ?>
</li>  
            </ul>
          </div>
          <?php endfor; endif; ?> <br/>
          <div style="width:97%; height:22px">
            <div style="height:22px;  float:left">
              <div style="width:365px; height:22px; border:1px solid #AED4EB; float:left; padding-top:3px; padding-bottom:3px; padding-left:6px;"> <strong> 共<?php echo $this->_tpl_vars['Fraction']['countRs']; ?>
篇&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['Fraction']['pageSize']; ?>
篇&nbsp;&nbsp;第<?php echo $this->_tpl_vars['Fraction']['page']; ?>
页/共<?php echo $this->_tpl_vars['Fraction']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Fraction.php?fra_id=<?php echo $_GET['fra_id']; ?>
&exa_title=<?php echo $_GET['exa_title']; ?>
&page=<?php echo $this->_tpl_vars['Fraction']['first']; ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Fraction.php?fra_id=<?php echo $_GET['fra_id']; ?>
&exa_title=<?php echo $_GET['exa_title']; ?>
&page=<?php echo $this->_tpl_vars['Fraction']['previous']; ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Fraction.php?fra_id=<?php echo $_GET['fra_id']; ?>
&exa_title=<?php echo $_GET['exa_title']; ?>
&page=<?php echo $this->_tpl_vars['Fraction']['next']; ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Fraction.php?fra_id=<?php echo $_GET['fra_id']; ?>
&exa_title=<?php echo $_GET['exa_title']; ?>
&page=<?php echo $this->_tpl_vars['Fraction']['last']; ?>
" class="a1">尾页</a></strong> </div>
              <?php unset($this->_sections['numId']);
$this->_sections['numId']['name'] = 'numId';
$this->_sections['numId']['loop'] = is_array($_loop=$this->_tpl_vars['Fraction']['arrayNum']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
              <div style="width:23px; height:22px; float:left; border:1px solid #AED4EB; text-align:center; <?php if ($this->_tpl_vars['Fraction']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['Fraction']['page']): ?> background-color:#51D26B <?php endif; ?> "> <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Fraction.php?fra_id=<?php echo $_GET['fra_id']; ?>
&exa_title=<?php echo $_GET['exa_title']; ?>
&page=<?php echo $this->_tpl_vars['Fraction']['arrayNum'][$this->_sections['numId']['index']]; ?>
" class="<?php if ($this->_tpl_vars['Fraction']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['Fraction']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['Fraction']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['Fraction']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['Fraction']['page']): ?><?php endif; ?></a> </div>
              <?php endfor; endif; ?> </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <?php else: ?>
 	<div class="right">  <img src="images/none2.jpg" alt="" /></div>
  <?php endif; ?> </div>