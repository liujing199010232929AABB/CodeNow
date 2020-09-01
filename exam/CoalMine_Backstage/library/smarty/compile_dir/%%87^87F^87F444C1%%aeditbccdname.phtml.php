<?php /* Smarty version 2.6.19, created on 2016-09-27 15:29:25
         compiled from aeditbccdname.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'aeditbccdname.phtml', 168, false),)), $this); ?>
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/reset.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Scripts/common.js"></script>
<SCRIPT src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/Scripts/jquery.js"></SCRIPT>
<script>
    <?php echo '
    $(document).ready(function(){
        strArr = Array();
        if(document.getElementById("typestr")){
            typestr = document.getElementById("typestr").value;
            strArr = typestr.split("@");
        }
        changeProClass();
    });
    function changeProClass(){
        getCheckboxValue();
        var str = $(\'#form_addbccdinfo\').serialize();
        $.post(\'getproquestions.php\',str,function(data){
            var pagerString = \'\';
            var htmlContentString = \'\'
            var pageSize = 20;
            d = data.split(\'"***"\');
            pagestr = d[0];
            aa = eval("("+pagestr+")");

            $(\'#displayquestions\').html(d[1]);
            for(k in aa){
                pagerString = "";
                var countPage = Math.ceil(aa[k] / pageSize);
                for(i = 1;i <= countPage && 10 >= i;i++){
                    if(1 == i){
                        pagerString +=\'<a>\'+i+\'</a> \'
                    } else {
                        pagerString += \'&nbsp;<a href="javascript:void(0)" onclick="paging(\'
                            +i+\',\'+\'\\\'\'+k+\'\\\'\'+\')">\'+i+\'</a>&nbsp;\'
                    }
                }
                $("#pager"+k).html(pagerString);
            }
            $("#checkedquestions").attr("value",strArr.join(\'@\'));
        });
    }
    function paging(page,k){
        getCheckboxValue();
        var str = $(\'#form_addbccdinfo\').serialize()+"&offset="+page+"&type="+k;
        $.post(\'getproquestions.php\',str,function(data){
            var pagerString = \'\';
            var htmlContentString = \'\'
            var pageSize = 20;
            d = data.split("\\"***\\"");
            pagestr = d[0];
            aa = eval("("+pagestr+")");

            $(\'#displayquestions\').html(d[1]);
            for(m in aa){
                pagerString = "";
                var countPage = Math.ceil(aa[m] / pageSize);
                if(m == k){
                    for(i = page - 5;i <= page + 5 && i <= countPage;i++){
                        if(0 < i){
                            if(i == page){
                                pagerString += \'<a>\'+i+\'</a>\'
                            } else {
                                pagerString += \'&nbsp;<a href="javascript:void(0)" onclick="paging(\'
                                    +i+\',\'+\'\\\'\'+m+\'\\\'\'+\')">\'+i+\'</a>&nbsp;\'
                            }
                        }
                    }
                    $("#pager"+m).html(pagerString);
                }else{
                    pagerString = "";
                    var countPage = Math.ceil(aa[m] / pageSize);
                    for(i = 1;i <= countPage && 10 >= i;i++){
                        if(1 == i){
                            pagerString +=\'<a>\'+i+\'</a> \'
                        } else {
                            pagerString += \'&nbsp;<a href="javascript:void(0)" onclick="paging(\'
                                +i+\',\'+\'\\\'\'+m+\'\\\'\'+\')">\'+i+\'</a>&nbsp;\'
                        }
                    }
                    $("#pager"+m).html(pagerString);
                }
            }
            $("#checkedquestions").attr("value",strArr.join(\'@\'));
        });
    }
    function checkall(flag){
        return chkinputbccdinfo() && chknumber(flag);
    }
    function chkinputbccdinfo(){
        if($(\'#pro_class\').val() == \'\'){
            alert(\'请选择所属类别！\');
            $(\'#pro_class\').focus();
            return false;
        }
        if($(\'#title\').val() == \'\'){
            alert(\'请输入标题！\');
            $(\'#title\').focus();
            return false;
        }

        if($(\'#template\').val() == \'\'){
            alert(\'请选择考卷模板！\');
            $(\'#template\').focus();
            return false;
        }
        return true;
    }

    function chknumber(){
        var result = false;
        param = $(\'#form_addbccdinfo\').serialize()+"&flag=1";
        $.ajax({
            type:\'post\',
            url:\'chknumber.php\',
            data:param,
            async:false,
            success:function(data){
                if(data != \'\'){
                    alert(data);
                }else{
                    result = true;
                }
            }
        })
        return result;
    }
    function getCheckboxValue(){
        $("input[type=\'checkbox\'][name!=\'exam_user[]\']:checked")
            .each(function(){
                if(!strArr.in_array($(this).attr(\'name\')+$(this).val())){
                    strArr.push($(this).attr(\'name\')+$(this).val());
                }
            })
    }

    Array.prototype.in_array = function(e){
        for(i=0;i<this.length;i++){
            if(this[i] == e){
                return true;
            }
        }
        return false;
    }
    '; ?>

</script>
<!--右侧-->
<div id="con_right">
  <div class="right_con">
    <div class="right_con_bt">·<?php echo $_GET['big_type']; ?>
 < <?php echo $_GET['small_type']; ?>
</div>
    <br />
    <br />
    <br />
    <DIV>
      <DIV style="padding-left:6px;">
        <UL>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 58%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">标题 </LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 25px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;">添加时间 </LI>
          <LI style="LINE-HEIGHT: 25px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 25px; border-bottom:#21de26 1px solid;">操作 </LI>
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
        <UL>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 58%; padding-left:10px; FLOAT: left; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"> <?php echo $this->_reg_objects['util'][0]->msubstr($this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['title'],0,60,"...");?>

         </LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 23px; BORDER-RIGHT: #21de26 1px solid; border-bottom:#21de26 1px solid;"><?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['dates']; ?>
</LI>
          <LI style="LINE-HEIGHT: 23px; WIDTH: 20%; FLOAT: left; text-align:center; HEIGHT: 23px; border-bottom:#21de26 1px solid;"><a href="look_examination.php?look=l&id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
" target="_blank" class="a1">预览试卷&nbsp;|&nbsp;<a href="?edit=t&id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">更改&nbsp;|&nbsp;<a href="?delete=t&id=<?php echo $this->_tpl_vars['bcjyzs']['data'][$this->_sections['id']['index']]['id']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">删除</a>
</LI>
        </UL>
      </DIV>
      <?php endfor; endif; ?> 
   </DIV>
     <br />
     <div style="padding-left:6px; padding-top:6px;"> <?php if ($this->_tpl_vars['bcjyzs']['data'] != false): ?>
      <div style="height:22px;  float:left">
        <div style="width:400px; height:22px; border:1px solid #AED4EB; padding-left:5px; float:left; padding-top:3px"> <strong> 共<?php echo $this->_tpl_vars['bcjyzs']['countRs']; ?>
条&nbsp;&nbsp;每页<?php echo $this->_tpl_vars['bcjyzs']['pageSize']; ?>
条&nbsp;&nbsp;第<?php echo $this->_tpl_vars['bcjyzs']['page']; ?>
页/共<?php echo $this->_tpl_vars['bcjyzs']['countPage']; ?>
页&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditbccdname.php?page=<?php echo $this->_tpl_vars['bcjyzs']['first']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">首页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditbccdname.php?page=<?php echo $this->_tpl_vars['bcjyzs']['previous']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">上页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditbccdname.php?page=<?php echo $this->_tpl_vars['bcjyzs']['next']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">下页</a>&nbsp;&nbsp;<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/aeditbccdname.php?page=<?php echo $this->_tpl_vars['bcjyzs']['last']; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="a1">尾页</a></strong> </div>
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
/aeditbccdname.php?page=<?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
&big_type=<?php echo ((is_array($_tmp=$_GET['big_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
&small_type=<?php echo ((is_array($_tmp=$_GET['small_type'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" class="<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?>a2<?php else: ?>a6<?php endif; ?>"><?php echo $this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']]; ?>
<?php if ($this->_tpl_vars['bcjyzs']['arrayNum'][$this->_sections['numId']['index']] == $this->_tpl_vars['bcjyzs']['page']): ?><?php endif; ?></a> </div>
        <?php endfor; endif; ?> 
        </div>
      <?php endif; ?> </div>
    <br />
    <br />
    <?php if ($this->_tpl_vars['edit'] == 't'): ?>
    <div class="right_con_form">
      <form id="form_addbccdinfo" name="form_addbccdinfo" method="post" action="" enctype="multipart/form-data" onsubmit="return chkinputbccdinfo(this)">
    <br />
    所属类别：<select name="pro_class" id="pro_class" class="input1" onchange="changeProClass()">
       <?php echo $this->_tpl_vars['displayType']; ?>

    </select>
    <br /><br />
    试卷标题：
    <input type="text" id="title" name="title" size="65" class="input1" value="<?php echo $this->_tpl_vars['bccdname'][0]['title']; ?>
" />　
<br/><br/>    

 
开始时间：
<input type="text" name="start_exam" id="start_exam" value="<?php echo $this->_tpl_vars['bccdname'][0]['start_exam']; ?>
" class="input1" />&nbsp;&nbsp;
结束时间：<input type="text" name="over_exam" id="over_exam" value="<?php echo $this->_tpl_vars['bccdname'][0]['over_exam']; ?>
" class="input1" />&nbsp;&nbsp;（时间格式 0000-00-00 00:00:00）
<br/><br/>

          <input type="hidden" id="typestr" name="typestr" value="<?php echo $this->_tpl_vars['typeStr']; ?>
" />
          <input type="hidden" id="checkedquestions" name="checkedquestions" value="" />
          <br/>
  <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $this->_tpl_vars['bccdname'][0]['id']; ?>
" />

  <input type="image" name="submit" id="submit" src="images/submit.jpg"/>
  <br />
  <br />
</p>
    </form>
    </div>
    <?php endif; ?> </div>
</div>