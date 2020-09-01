<?php /* Smarty version 2.6.19, created on 2016-09-27 14:52:57
         compiled from getproquestions.phtml */ ?>
<script>
    <?php echo '
    $(document).ready(function(){
        $("input[type=\'checkbox\'][name!=\'exam_user[]\']")
            .each(function(){
                if(strArr.in_array($(this).attr("name")+$(this).val())){
                    $(this).attr(\'checked\',true);
                }
            })
    });

    function deleteElem(obj){
        if(!obj.checked){
            strArr.remove(obj.name+obj.value);
            $("#checkedquestions").attr("value",strArr.join(\'@\'));
        }
    }
    Array.prototype.indexOf = function(val){
        for(var i=0;i<this.length;i++){
            if(this[i] == val){
                return i;
            }
        }
    }
    Array.prototype.remove = function(val){
        var index = this.indexOf(val);
        if(index > -1){
            this.splice(index,1)
        }
    }

    '; ?>

</script>
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['tb_exam_type']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<DIV class=section title=<?php echo $this->_tpl_vars['tb_exam_type'][$this->_sections['id']['index']]['chinese']; ?>
>
    <TABLE border=0 cellSpacing=0 cellPadding=0 width="697" style="margin-top:8px; display:inline; background-color:#f6f5f5; border:1px solid #c6c4c4;">
        <TBODY>
        <TR>
            <TD class=bt-tdleft><H5><?php echo $this->_tpl_vars['tb_exam_type'][$this->_sections['id']['index']]['chinese']; ?>
</H5></TD>
            <TD class=bt-tdm><DIV>
                <DIV class=right2-bt><SPAN class=Text-t12><?php echo $this->_tpl_vars['tb_exam_type'][$this->_sections['id']['index']]['chinese']; ?>
题题库。</SPAN><BR>
                    <DIV><IMG src="images/row.jpg" width=4
                              height=10>&nbsp;提示：在展开后的列表中存储了所有<?php echo $this->_tpl_vars['tb_exam_type'][$this->_sections['id']['index']]['chinese']; ?>
的内容，管理员可以根据需要进行选择......</DIV>
                </DIV>
            </DIV></TD>
            <TD class=bt-tdr><SPAN class=control><A onfocus=this.blur() onclick="openShutManager(this,'<?php echo $this->_tpl_vars['tb_exam_type'][$this->_sections['id']['index']]['id']; ?>
',false,'折叠','展开');">展开</A></SPAN></TD>
        </TR>
        </TBODY>
    </TABLE>
    <DIV style="DISPLAY: <?php if ($this->_tpl_vars['emtype'] == $this->_tpl_vars['tb_exam_type'][$this->_sections['id']['index']]['english']): ?> block <?php else: ?>none<?php endif; ?>" id=<?php echo $this->_tpl_vars['tb_exam_type'][$this->_sections['id']['index']]['id']; ?>
>
        <DIV> &nbsp;&nbsp; </DIV>
        <DIV class=nr-2>
                    <PRE class=brush:java>
<div style="width: 95%; border: 1px solid #21de26; ">

    <?php $_from = $this->_tpl_vars['problem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
    <?php if ($this->_tpl_vars['k'] == $this->_tpl_vars['tb_exam_type'][$this->_sections['id']['index']]['english']): ?>
    <?php unset($this->_sections['ids']);
$this->_sections['ids']['name'] = 'ids';
$this->_sections['ids']['loop'] = is_array($_loop=$this->_tpl_vars['v']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ids']['show'] = true;
$this->_sections['ids']['max'] = $this->_sections['ids']['loop'];
$this->_sections['ids']['step'] = 1;
$this->_sections['ids']['start'] = $this->_sections['ids']['step'] > 0 ? 0 : $this->_sections['ids']['loop']-1;
if ($this->_sections['ids']['show']) {
    $this->_sections['ids']['total'] = $this->_sections['ids']['loop'];
    if ($this->_sections['ids']['total'] == 0)
        $this->_sections['ids']['show'] = false;
} else
    $this->_sections['ids']['total'] = 0;
if ($this->_sections['ids']['show']):

            for ($this->_sections['ids']['index'] = $this->_sections['ids']['start'], $this->_sections['ids']['iteration'] = 1;
                 $this->_sections['ids']['iteration'] <= $this->_sections['ids']['total'];
                 $this->_sections['ids']['index'] += $this->_sections['ids']['step'], $this->_sections['ids']['iteration']++):
$this->_sections['ids']['rownum'] = $this->_sections['ids']['iteration'];
$this->_sections['ids']['index_prev'] = $this->_sections['ids']['index'] - $this->_sections['ids']['step'];
$this->_sections['ids']['index_next'] = $this->_sections['ids']['index'] + $this->_sections['ids']['step'];
$this->_sections['ids']['first']      = ($this->_sections['ids']['iteration'] == 1);
$this->_sections['ids']['last']       = ($this->_sections['ids']['iteration'] == $this->_sections['ids']['total']);
?>
    <div style="width:100%; border-top: 1px solid #21de26; ">
        <ul>
            <li style="width:10%; line-height:23px; float:left; text-align:center; border-right: 1px solid #21de26;"><input type="checkbox"  name="<?php echo $this->_tpl_vars['v'][$this->_sections['ids']['index']]['pro_type']; ?>
[]" value="<?php echo $this->_tpl_vars['v'][$this->_sections['ids']['index']]['id']; ?>
" onchange="deleteElem(this)"/>
            </li>
            <li style="float:left; padding-left:6px;"><?php echo $this->_tpl_vars['v'][$this->_sections['ids']['index']]['content']; ?>
</li>
        </ul>
    </div>
    <?php endfor; endif; ?>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
</div>
<div id="pager<?php echo $this->_tpl_vars['tb_exam_type'][$this->_sections['id']['index']]['english']; ?>
"></div>
</PRE>
        </DIV>
    </DIV>
</DIV>

<!--section 二叉树的性质-->
<?php endfor; endif; ?>