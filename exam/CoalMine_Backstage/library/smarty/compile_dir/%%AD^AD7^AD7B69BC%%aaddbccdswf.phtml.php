<?php /* Smarty version 2.6.19, created on 2016-09-27 10:37:45
         compiled from aaddbccdswf.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'aaddbccdswf.phtml', 30, false),)), $this); ?>
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
     <form name="form_addbccdinfo" method="post" action="" enctype="multipart/form-data" onsubmit="return chkinputbccdinfo(this)">
      <p><br />
        所属类别：
        <select name="pro_class" id="pro_class">
          <option value="">请选择</option>
          
    	<?php echo $this->_tpl_vars['displayType']; ?>

    
        </select>
      </p>
      <p>题型：
        <select name="pro_type" id="pro_type">
         <option value="">请选择</option>
         	<?php echo $this->_tpl_vars['tb_exam_type']; ?>

        </select>
        <br />
      <br />
          试题难度：
      <select name="degree" id="degree">
          <option value="">请选择</option>
          <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['degreeArr']), $this);?>

      </select>
      <br />
      <br />
        分数：<input type="text" name="fraction" size="15" class="input1" />
<br/>
  <br/>
          是否必须掌握：<input type="radio" name="mustknow" value="1" checked>是 &nbsp;<input type="radio" name="mustknow" value="0">否
          <br/>
          <br/>
          选择语音内容：
          <input name="sound" type="file" class="input1" id="sound" size="50" />
          <br/>
          <br/>
        问题：<?php echo $this->_reg_objects['util'][0]->editor('content',"","90%",'230');?>

   <br/> <br />
   注意：在添加“填空题”时，使用“______”填充要填写内容的空格，使用“ ”（空格）来区分每个空的答案。
  <br/> <br />
     注意：在添加“多选题”时，使用“ ”（空格）来区分多个答案。  
   <br/> <br />
   选项： 
   <input name="search_list" type="text" id="search_list" size="10" class="input1" />（*在添加单选和多选题时，请注意填写每题的选项数目,其余题目不用填写 ）
<br/> 
   <br />  
  
 答案： <textarea name="answer" id="answer" cols="103" rows="10" class="input1"></textarea>
    <br/> <br />
    解析： <textarea name="resolve" id="resolve" cols="103" rows="10" class="input1"></textarea>
   <br/> <br />
          <input type="radio" name="isactive" value="1" checked/>启用&nbsp;&nbsp;&nbsp;<input type="radio" name="isactive" value="0" />禁用
  <br/> <br />
          <input type="submit" value="提交">
    
   <br />
        <br />
      </p>
    </form>
    </DIV>
    <BR>
  </div>
</div>
<script language="javascript">
    function chkinputbccdinfo(form){
        if(form.pro_class.value==''){
            alert('请选择工种！');
            form.pro_class.focus();
            return false; 
        }
        if(form.pro_type.value==''){
            alert('请选择题型！');
            form.pro_type.focus();
            return false; 
       }

       if(form.fraction.value==''){
           alert('请输入分值！');
           form.fraction.focus();
           return false; 
      }
	  
	  	var Expression=/^([1-9])([0-9])*[0-9]$|^[1-9]$/;		//判断提交的值是否为正整数的正则表达式
		var objExp=new RegExp(Expression);
		if(!objExp.test(form.fraction.value)){
           alert('请输入正确的分值！');
           form.fraction.focus();
           return false; 
      }
	 
	    if(form.answer.value==''){
          alert('请填写答案！');
          form.answer.focus();
          return false; 
     }
        if(form.degree.value==''){
        alert('请选择试题难度！');
        form.degree.focus();
        return false;
    }
        return true; 
    }

</script>