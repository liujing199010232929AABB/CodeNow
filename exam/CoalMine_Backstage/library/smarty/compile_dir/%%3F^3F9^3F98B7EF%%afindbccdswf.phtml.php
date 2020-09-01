<?php /* Smarty version 2.6.19, created on 2016-10-28 15:15:25
         compiled from afindbccdswf.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'afindbccdswf.phtml', 73, false),)), $this); ?>
<link rel=stylesheet type=text/css href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/examinations.css">
<script type="text/javascript">
    function chksearch(){
    if(form1.pro_class.value=='' && form1.pro_type.value==''&& form1.id.value==''&& form1.content.value==''){
    alert('请输入查询关键字！');
    form1.pro_class.focus();
    return false;
    }
    return true;
    }
</script>
<!--右侧-->
<div id="con_right">
    <div class="right_con">
        <div class="right_con_bt">·<?php echo $_GET['big_type']; ?>
 < <?php echo $_GET['small_type']; ?>
</div>
        <div class="right_con_bt" style=" height:35px; padding-top:4px; padding-bottom:4px; padding-left:6px; ">
            <form id="form1" name="form1" method="get" action="afindbccdswf.php?big_type=<?php echo $_GET['big_type']; ?>
&small_type=<?php echo $_GET['small_type']; ?>
" >
            所属分类：
            <select name="pro_class" id="pro_class" class="input1" style="width: 133px;" <?php if ($_SESSION['back_permissions'] == 1): ?>disabled<?php endif; ?>>
            <option value="">请选择</option>
            <?php echo $this->_tpl_vars['displayType']; ?>

            </select>
            题型：
            <select name="pro_type" id="pro_type" class="input1" >
                <option value="">请选择</option>
                <option value="radio" <?php if ($this->_tpl_vars['pro_type'] == 'radio'): ?> selected <?php endif; ?>>单选</option>
                <option value="checkbox" <?php if ($this->_tpl_vars['pro_type'] == 'checkbox'): ?> selected <?php endif; ?>>多选</option>
				<option value="fill" <?php if ($this->_tpl_vars['pro_type'] == 'fill'): ?> selected <?php endif; ?>>填空</option>
                <option value="judgment" <?php if ($this->_tpl_vars['pro_type'] == 'judgment'): ?> selected <?php endif; ?>>判断</option>
                <!--<option value="explain" <?php if ($this->_tpl_vars['pro_type'] == 'explain'): ?> selected <?php endif; ?>>名词解释</option>
                <option value="answer" <?php if ($this->_tpl_vars['pro_type'] == 'answer'): ?> selected <?php endif; ?>>问答</option>-->
                <!--          <option value="discourse">论述</option>-->
            </select>
            试题ID：
            <input name="id" id="id" type="text" size="5" value="<?php echo $this->_tpl_vars['id']; ?>
"/>
            试题内容：
            <input name="content" id="content" type="text" size="20" value="<?php echo $this->_tpl_vars['content']; ?>
"/>
            <input type="submit" id="submit" value="查询" name="submit" onclick="return chksearch()">
        </div>
        <div>
            <?php if ($this->_tpl_vars['bcjyzs']['data'] != false): ?>
            <DIV style="padding-left:6px;">
                <ul>

                </ul>
                <ul style="margin-top: 50px">
                    <li><input type="checkbox" name="all" id="checkall" onclick="checkAll()"/>&nbsp;&nbsp;&nbsp;全选&nbsp;&nbsp;&nbsp;<input type="checkbox" name="all" id="uncheckall" onclick="uncheckAll()"/>&nbsp;&nbsp;&nbsp;取消&nbsp;&nbsp;&nbsp;<input type="submit" name="active" value="启用" onclick="return ischecked(1)"/>&nbsp;&nbsp;&nbsp;<input type="submit" name="inactive" value="禁用" onclick="return ischecked(0)"/>&nbsp;&nbsp;&nbsp;<input type="submit" name="deltogether" value="删除" onclick="return ischecked(2)"/></li>
                </ul>
                <UL>
                    <LI style="LINE-HEIGHT: 25px; WIDTH: 23%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">ID</LI>
                    <LI style="LINE-HEIGHT: 25px; WIDTH: 30%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">所属分类</LI>

                    <LI style="LINE-HEIGHT: 25px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">题型</LI>
                    <LI style="LINE-HEIGHT: 25px; WIDTH: 25%; FLOAT: left; text-align:center; HEIGHT: 25px; border-bottom:#21de26 1px solid;">操作 </LI>
                </UL>
            </DIV>
            <?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['bcjyzs']['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <DIV style="padding-left:6px;">
                <UL><LI style="LINE-HEIGHT: 23px;  HEIGHT: 23px;"> <input type="checkbox" name="isactive[]" id="isactive_<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
"/>
                </LI>


                    <LI style="LINE-HEIGHT: 23px; WIDTH: 23%; padding-left:10px; FLOAT: left;text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"> <?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>

                    </LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 30%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php unset($this->_sections['bccdnameids']);
$this->_sections['bccdnameids']['name'] = 'bccdnameids';
$this->_sections['bccdnameids']['loop'] = is_array($_loop=$this->_tpl_vars['arrayBccdnames1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['bccdnameids']['show'] = true;
$this->_sections['bccdnameids']['max'] = $this->_sections['bccdnameids']['loop'];
$this->_sections['bccdnameids']['step'] = 1;
$this->_sections['bccdnameids']['start'] = $this->_sections['bccdnameids']['step'] > 0 ? 0 : $this->_sections['bccdnameids']['loop']-1;
if ($this->_sections['bccdnameids']['show']) {
    $this->_sections['bccdnameids']['total'] = $this->_sections['bccdnameids']['loop'];
    if ($this->_sections['bccdnameids']['total'] == 0)
        $this->_sections['bccdnameids']['show'] = false;
} else
    $this->_sections['bccdnameids']['total'] = 0;
if ($this->_sections['bccdnameids']['show']):

            for ($this->_sections['bccdnameids']['index'] = $this->_sections['bccdnameids']['start'], $this->_sections['bccdnameids']['iteration'] = 1;
                 $this->_sections['bccdnameids']['iteration'] <= $this->_sections['bccdnameids']['total'];
                 $this->_sections['bccdnameids']['index'] += $this->_sections['bccdnameids']['step'], $this->_sections['bccdnameids']['iteration']++):
$this->_sections['bccdnameids']['rownum'] = $this->_sections['bccdnameids']['iteration'];
$this->_sections['bccdnameids']['index_prev'] = $this->_sections['bccdnameids']['index'] - $this->_sections['bccdnameids']['step'];
$this->_sections['bccdnameids']['index_next'] = $this->_sections['bccdnameids']['index'] + $this->_sections['bccdnameids']['step'];
$this->_sections['bccdnameids']['first']      = ($this->_sections['bccdnameids']['iteration'] == 1);
$this->_sections['bccdnameids']['last']       = ($this->_sections['bccdnameids']['iteration'] == $this->_sections['bccdnameids']['total']);
?>
                        <?php if ($this->_tpl_vars['arrayBccdnames1'][$this->_sections['bccdnameids']['index']]['id'] == $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['pro_class']): ?>
                        <?php echo $this->_tpl_vars['arrayBccdnames1'][$this->_sections['bccdnameids']['index']]['typename']; ?>

                        <?php endif; ?>
                        <?php endfor; endif; ?></LI>

                    <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['chinese']; ?>
</LI>
                    <LI style="LINE-HEIGHT: 23px; WIDTH: 25%; FLOAT: left; text-align:center; HEIGHT: 23px; border-bottom:#21de26 1px solid;">
                        <a href="aeditbccdswf.php?edit=t&id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
&q=<?php echo $this->_tpl_vars['q']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">更改&nbsp;|&nbsp;<a href="alookbccdswf.php?delete=t&id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp='更改试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">删除</a>
                    </LI>
                </UL>
            </DIV>
            <?php endfor; endif; ?>
            </form>

            <div style="padding-left:6px; padding-top:6px; padding-bottom:6px;">
                <div style="height:22px;  float:left">
                    <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['bcjyzs']['countRs']; ?>
篇&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['bcjyzs']['pageSize']; ?>
篇&nbsp;&nbsp;第<?php echo $this->_tpl_vars['bcjyzs']['page']; ?>
页/共<?php echo $this->_tpl_vars['bcjyzs']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/afindbccdswf.php?page=<?php echo $this->_tpl_vars['bcjyzs']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
<?php if ($this->_tpl_vars['pro_class'] != ''): ?>&pro_class=<?php echo $this->_tpl_vars['pro_class']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['pro_type'] != ''): ?>&pro_type=<?php echo $this->_tpl_vars['pro_type']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['id'] != ''): ?>&id=<?php echo $this->_tpl_vars['id']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['content'] != ''): ?>&content=<?php echo $this->_tpl_vars['content']; ?>
<?php endif; ?>" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/afindbccdswf.php?page=<?php echo $this->_tpl_vars['bcjyzs']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
<?php if ($this->_tpl_vars['pro_class'] != ''): ?>&pro_class=<?php echo $this->_tpl_vars['pro_class']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['pro_type'] != ''): ?>&pro_type=<?php echo $this->_tpl_vars['pro_type']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['id'] != ''): ?>&id=<?php echo $this->_tpl_vars['id']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['content'] != ''): ?>&content=<?php echo $this->_tpl_vars['content']; ?>
<?php endif; ?>" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/afindbccdswf.php?page=<?php echo $this->_tpl_vars['bcjyzs']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
<?php if ($this->_tpl_vars['pro_class'] != ''): ?>&pro_class=<?php echo $this->_tpl_vars['pro_class']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['pro_type'] != ''): ?>&pro_type=<?php echo $this->_tpl_vars['pro_type']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['id'] != ''): ?>&id=<?php echo $this->_tpl_vars['id']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['content'] != ''): ?>&content=<?php echo $this->_tpl_vars['content']; ?>
<?php endif; ?>" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/afindbccdswf.php?page=<?php echo $this->_tpl_vars['bcjyzs']['last']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
<?php if ($this->_tpl_vars['pro_class'] != ''): ?>&pro_class=<?php echo $this->_tpl_vars['pro_class']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['pro_type'] != ''): ?>&pro_type=<?php echo $this->_tpl_vars['pro_type']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['id'] != ''): ?>&id=<?php echo $this->_tpl_vars['id']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['content'] != ''): ?>&content=<?php echo $this->_tpl_vars['content']; ?>
<?php endif; ?>" class="a1">尾页</a></strong> </div>
                    <?php unset($this->_sections['numId']);
$this->_sections['numId']['name'] = 'numId';
$this->_sections['numId']['loop'] = is_array($_loop=$this->_tpl_vars['bcjyzs']['arrayNum']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <div style="width:23px; height:22px; padding-left:5px; float:left; border:1px solid #AED4EB; padding-top:3px ;<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?> background-color:#51D26B <?php endif; ?> "> <a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/afindbccdswf.php?page=<?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
<?php if ($this->_tpl_vars['pro_class'] != ''): ?>&pro_class=<?php echo $this->_tpl_vars['pro_class']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['pro_type'] != ''): ?>&pro_type=<?php echo $this->_tpl_vars['pro_type']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['id'] != ''): ?>&id=<?php echo $this->_tpl_vars['id']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['content'] != ''): ?>&content=<?php echo $this->_tpl_vars['content']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?><?php endif; ?></a> </div>
                    <?php endfor; endif; ?> </div>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<script language="javascript">
    function checkAll () {
    var input = document.getElementsByTagName("input");
    for(i=0;i<input.length;i++){
    if(input[i].type == "checkbox"){
    if(input[i].id == "uncheckall"){
    continue;
    }
    input[i].checked = true;
    }
    }
    }

    function uncheckAll () {
    var input = document.getElementsByTagName("input");
    for(i=0;i<input.length;i++){
    if(input[i].type == "checkbox"){
    input[i].checked = false;
    }
    }
    }

    function ischecked(num){
    var input = document.getElementsByTagName("input");
    var message = "";
    var chk = false;
    for(i=0;i<input.length;i++){
    if(input[i].type == "checkbox" && input[i].checked == true){
    chk = true;
    }
    }
    if(chk == false){
    if(num == 0){
    message = "请至少选择一项要禁用的试题！";
    }else if(num == 1){
    message = "请至少选择一项要启用的试题！";
    } else {
    message = "请至少选择一项要删除的试题！";
    }
    alert(message);
    return false;
    }
    return true;
    }

</script>