<?php /* Smarty version 2.6.19, created on 2012-09-26 13:20:05
         compiled from addexamtypes.phtml */ ?>
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/reset.css" rel="stylesheet" type="text/css" />
<div id="con_right">
    <div class="right_con">
        <div class="right_con_bt">·<?php echo $_GET['big_type']; ?>
 < <?php echo $_GET['small_type']; ?>
</div>
        <br />
        <br />
        <br />
        <DIV class="right_con_form">
            <form name="form_addexamtypes" method="post" action="" onsubmit="return chkInputBigtype(this)">
                <div style="width:100%; text-align:left; padding-top:5px; padding-left:50px">
                    所属分类（不填写为一级分类）：<select name="pro_type" id="pro_type" class="input1" >
                    <option value=0>请选择</option>
                    <?php echo $this->_tpl_vars['tb_exam_type']; ?>

                </select>
                    <br />
                    <br />
                    分类名称：<input type="text" name="chinese" size="30" class="input"/><br/><br/>
                    英文名称：<input type="text" name="english" size="30" class="input"/><br/><br/>
                    <input type="submit" value="添加" />&nbsp;&nbsp;<input type="reset" value="重置" />
                </div>
            </form>
        </DIV>
        <BR>
    </div>
</div>

<script language="javascript">
    function chkInputBigtype (form) {
    if (form.chinese.value == "") {
    alert("请输入类别名称！");
    form.chinese.focus();
    return false;
    }
    if (form.english.value == "") {
    alert("请输入英文名称！");
    form.english.focus();
    return false;
    }
    return true;
    }
</script> 