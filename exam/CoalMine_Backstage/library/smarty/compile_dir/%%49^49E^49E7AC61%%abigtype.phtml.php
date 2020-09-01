<?php /* Smarty version 2.6.19, created on 2016-09-27 10:37:11
         compiled from abigtype.phtml */ ?>
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
            <form name="form_addbigtype" method="post" action="" onsubmit="return chkInputBigtype(this)">
                <div style="width:100%; text-align:left; padding-top:5px; padding-left:50px">
                    所属分类（不填写为一级分类）：<select name="pro_class" id="pro_class" class="input1" >
                    <option value=0>请选择</option>
                    <?php echo $this->_tpl_vars['displayType']; ?>

                </select>
                    <br />
                    分类名称：<input type="text" name="typename" size="30" class="input"/><br /><br />
                    <input type="submit" value="添加" />&nbsp;&nbsp;<input type="reset" value="重置" />
                </div>
            </form>
        </DIV>
        <BR>
    </div>
</div>

<script language="javascript">
    function chkInputBigtype (form) {
    if (form.typename.value == "") {
    alert("请输入类别名称！");
    form.typename.focus();
    return false;
    }
    return true;
    }
</script>