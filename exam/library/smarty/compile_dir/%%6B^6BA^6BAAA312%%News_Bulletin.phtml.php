<?php /* Smarty version 2.6.19, created on 2016-09-27 17:16:31
         compiled from News_Bulletin.phtml */ ?>
<script src="Scripts/Random_Answer.js" type="text/javascript"></script>
<!--内容开始 -->
<div id="sub">
  <div id="sub_left">
    <div class="left_fl">
      <div class="left_fl_bt"><img src="images/382.jpg" alt="" /></div>
      <div id="PARENT">
        <ul id="left_fl_con1">
          <?php unset($this->_sections['new_id']);
$this->_sections['new_id']['name'] = 'new_id';
$this->_sections['new_id']['loop'] = is_array($_loop=$this->_tpl_vars['News']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['new_id']['show'] = true;
$this->_sections['new_id']['max'] = $this->_sections['new_id']['loop'];
$this->_sections['new_id']['step'] = 1;
$this->_sections['new_id']['start'] = $this->_sections['new_id']['step'] > 0 ? 0 : $this->_sections['new_id']['loop']-1;
if ($this->_sections['new_id']['show']) {
    $this->_sections['new_id']['total'] = $this->_sections['new_id']['loop'];
    if ($this->_sections['new_id']['total'] == 0)
        $this->_sections['new_id']['show'] = false;
} else
    $this->_sections['new_id']['total'] = 0;
if ($this->_sections['new_id']['show']):

            for ($this->_sections['new_id']['index'] = $this->_sections['new_id']['start'], $this->_sections['new_id']['iteration'] = 1;
                 $this->_sections['new_id']['iteration'] <= $this->_sections['new_id']['total'];
                 $this->_sections['new_id']['index'] += $this->_sections['new_id']['step'], $this->_sections['new_id']['iteration']++):
$this->_sections['new_id']['rownum'] = $this->_sections['new_id']['iteration'];
$this->_sections['new_id']['index_prev'] = $this->_sections['new_id']['index'] - $this->_sections['new_id']['step'];
$this->_sections['new_id']['index_next'] = $this->_sections['new_id']['index'] + $this->_sections['new_id']['step'];
$this->_sections['new_id']['first']      = ($this->_sections['new_id']['iteration'] == 1);
$this->_sections['new_id']['last']       = ($this->_sections['new_id']['iteration'] == $this->_sections['new_id']['total']);
?>
          <li><a href="News_Bulletin.php?news_id=<?php echo $this->_tpl_vars['News'][$this->_sections['new_id']['index']]['id']; ?>
&new_bulletin=新闻" title="<?php echo $this->_tpl_vars['News'][$this->_sections['new_id']['index']]['title']; ?>
"><?php echo $this->_reg_objects['util'][0]->msubstr($this->_tpl_vars['News'][$this->_sections['new_id']['index']]['title'],0,18,"...");?>
</a> </li>
          <?php endfor; endif; ?>
        </ul>
      </div>
    </div>
    <div style="line-height:5;">&nbsp;</div>
    <div class="left_fl">
      <div class="left_fl_bt"><img src="images/383.jpg" alt="" /></div>
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
    </div>
  </div>
  <?php if ($this->_tpl_vars['Bulletin_New'] == 'T'): ?>
  <div id="sub_right"> <?php if ($_GET['new_bulletin'] == "新闻"): ?>
    <div class="right">
      <div class="right_bt"><?php echo $_GET['new_bulletin']; ?>
</div>
      <div class="right_con">
        <div class="right_con_bt"><?php echo $this->_reg_objects['util'][0]->msubstr($this->_tpl_vars['arrayNews'][0]['title'],0,48,"...");?>
</div>
        <div class="right_con_text"> <?php echo $this->_tpl_vars['arrayNews'][0]['content']; ?>

          <?php if ($this->_tpl_vars['arrayNews'][0]['attachment'] != ""): ?> <br>
          <a href="adm/upfiles/Trainingmaterials/<?php echo $this->_tpl_vars['arrayNews'][0]['attachment']; ?>
" style="float:right">附近下载</a> <?php endif; ?> </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if ($_GET['new_bulletin'] == "公告"): ?>
    <div class="right">
      <div class="right_bt"><?php echo $_GET['new_bulletin']; ?>
</div>
      <div class="right_con">
        <div class="right_con_bt"><?php echo $this->_reg_objects['util'][0]->msubstr($this->_tpl_vars['arrayBulletin'][0]['title'],0,48,"...");?>
</div>
        <div class="right_con_text"> <?php echo $this->_tpl_vars['arrayBulletin'][0]['content']; ?>

          <?php if ($this->_tpl_vars['arrayBulletin'][0]['attachment'] != ""): ?> <br>
          <a href="adm/upfiles/Trainingmaterials/<?php echo $this->_tpl_vars['arrayBulletin'][0]['attachment']; ?>
" style="float:right">附近下载</a> <?php endif; ?> </div>
      </div>
    </div>
    <?php endif; ?> </div>
   <?php else: ?>
 	<div class="right">  <img src="images/none1.jpg" alt="" /></div>
   <?php endif; ?>
</div>