<?php /* Smarty version 2.6.19, created on 2016-11-30 08:50:12
         compiled from Training.phtml */ ?>
<script src="Scripts/Random_Answer.js" type="text/javascript"></script>
<!--内容开始 -->
<div id="sub">
	<div id="sub_left">
    	<div class="left_fl">
        	<div class="left_fl_bt"><img src="images/38.jpg" alt="" /></div>
            	<div id="PARENT">
                	<ul id="left_fl_con1">
<?php $i=0; ?>

<?php unset($this->_sections['type_id']);
$this->_sections['type_id']['name'] = 'type_id';
$this->_sections['type_id']['loop'] = is_array($_loop=$this->_tpl_vars['examType']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

 						<li><a href="#" onClick="DoMenu('ChildMenu<?php  echo $i;  ?>')"><?php echo $this->_reg_objects['util'][0]->getTypename($this->_tpl_vars['examType'][$this->_sections['type_id']['index']]['pro_class'],0,15,"...");?>
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
                        	<?php if ($this->_tpl_vars['examType'][$this->_sections['type_id']['index']]['pro_class'] == $this->_tpl_vars['examTypes'][$this->_sections['exam_id']['index']]['pro_class']): ?>
       							<li><a href="Training.php?know_id=<?php echo $this->_tpl_vars['examTypes'][$this->_sections['exam_id']['index']]['id']; ?>
" title="<?php echo $this->_tpl_vars['examTypes'][$this->_sections['exam_id']['index']]['title']; ?>
"><?php echo $this->_reg_objects['util'][0]->msubstr($this->_tpl_vars['examTypes'][$this->_sections['exam_id']['index']]['title'],0,18,"...");?>
</a></li>
                            <?php endif; ?>
       					<?php endfor; endif; ?>
      						</ul>
    					</li>
<?php endfor; endif; ?> 
					</ul>
				</div>
            </div>
        </div>
        <div id="sub_right">
        <?php if ($this->_tpl_vars['array'] != 'F'): ?>
        	<div class="right">
            	<div class="right_bt">培训内容</div>
                <div class="right_con">
                	<div class="right_con_bt"><?php echo $this->_reg_objects['util'][0]->msubstr($this->_tpl_vars['arrayExams'][0]['title'],0,48,"...");?>
</div>
                    <div class="right_con_texts">
<iframe name="content" src="CoalMine_Backstage/upfiles/Trainingmaterials/<?php echo $this->_tpl_vars['arrayExams'][0]['attachment']; ?>
"  frameborder="0" width="100%" height="100%" ></iframe>
                    </div>
                </div>
            </div>
        <?php else: ?>
        	<div class="right">  <img src="images/none2.jpg" alt="" /></div>
        <?php endif; ?>
        </div>
    </div>