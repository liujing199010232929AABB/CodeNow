<?php /* Smarty version 2.6.19, created on 2013-08-12 09:28:50
         compiled from search_Training.phtml */ ?>
<script src="Scripts/Random_Answer.js" type="text/javascript"></script>
<script src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Scripts/jquery-1.4.2.js"></script>
<script language="javascript">
        function showDhList(x){
            $("#"+x).slideToggle('fast');
        }

    </script>
<!--内容开始 -->
<div id="sub">
	<div id="sub_left">
    	<div class="left_fl">
        	<div class="left_fl_bt"><img src="images/38.jpg" alt="" /></div>
            	<div id="PARENT">
                	<ul id="left_fl_con1">
<?php $_from = $this->_tpl_vars['types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type_id']):
?>
 						<li><a href="#"  onClick="showDhList('a_<?php echo $this->_tpl_vars['type_id']; ?>
')"><?php unset($this->_sections['types_id']);
$this->_sections['types_id']['name'] = 'types_id';
$this->_sections['types_id']['loop'] = is_array($_loop=$this->_tpl_vars['typeNames']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['types_id']['show'] = true;
$this->_sections['types_id']['max'] = $this->_sections['types_id']['loop'];
$this->_sections['types_id']['step'] = 1;
$this->_sections['types_id']['start'] = $this->_sections['types_id']['step'] > 0 ? 0 : $this->_sections['types_id']['loop']-1;
if ($this->_sections['types_id']['show']) {
    $this->_sections['types_id']['total'] = $this->_sections['types_id']['loop'];
    if ($this->_sections['types_id']['total'] == 0)
        $this->_sections['types_id']['show'] = false;
} else
    $this->_sections['types_id']['total'] = 0;
if ($this->_sections['types_id']['show']):

            for ($this->_sections['types_id']['index'] = $this->_sections['types_id']['start'], $this->_sections['types_id']['iteration'] = 1;
                 $this->_sections['types_id']['iteration'] <= $this->_sections['types_id']['total'];
                 $this->_sections['types_id']['index'] += $this->_sections['types_id']['step'], $this->_sections['types_id']['iteration']++):
$this->_sections['types_id']['rownum'] = $this->_sections['types_id']['iteration'];
$this->_sections['types_id']['index_prev'] = $this->_sections['types_id']['index'] - $this->_sections['types_id']['step'];
$this->_sections['types_id']['index_next'] = $this->_sections['types_id']['index'] + $this->_sections['types_id']['step'];
$this->_sections['types_id']['first']      = ($this->_sections['types_id']['iteration'] == 1);
$this->_sections['types_id']['last']       = ($this->_sections['types_id']['iteration'] == $this->_sections['types_id']['total']);
?><?php if ($this->_tpl_vars['typeNames'][$this->_sections['types_id']['index']]['id'] == $this->_tpl_vars['type_id']): ?><?php echo $this->_tpl_vars['typeNames'][$this->_sections['types_id']['index']]['typename']; ?>
<?php endif; ?><?php endfor; endif; ?></a>
                        	<ul id="a_<?php echo $this->_tpl_vars['type_id']; ?>
" class="collapsed">
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
                        	<?php if ($this->_tpl_vars['type_id'] == $this->_tpl_vars['examTypes'][$this->_sections['exam_id']['index']]['pro_class']): ?>
       							<li><a href="search_Training.php?know_id=<?php echo $this->_tpl_vars['examTypes'][$this->_sections['exam_id']['index']]['id']; ?>
&searches=<?php echo $_SESSION['searches']; ?>
" title="<?php echo $this->_tpl_vars['examTypes'][$this->_sections['exam_id']['index']]['title']; ?>
"><?php echo $this->_reg_objects['util'][0]->msubstr($this->_tpl_vars['examTypes'][$this->_sections['exam_id']['index']]['title'],0,18,"...");?>
</a></li>
                            <?php endif; ?>
       					<?php endfor; endif; ?>
      						</ul>
    					</li>
<?php endforeach; endif; unset($_from); ?>

					</ul>
				</div>
            </div>
        </div>
        <div id="sub_right">
        <?php if ($this->_tpl_vars['array'] != 'F'): ?>
        	<div class="right">
            	<div class="right_bt"><?php echo $_GET['type_id']; ?>
</div>
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
        	<div class="right">
            <img src="images/none2.jpg" alt="" />
            </div>
        <?php endif; ?>
        </div>
    </div>