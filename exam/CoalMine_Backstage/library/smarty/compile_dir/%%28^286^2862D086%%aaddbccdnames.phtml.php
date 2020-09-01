<?php /* Smarty version 2.6.19, created on 2016-09-27 14:52:57
         compiled from aaddbccdnames.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'aaddbccdnames.phtml', 168, false),)), $this); ?>
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
         strArr = new Array();
         changeProClass();
    });
    function changeProClass(){
        strArr = [];
        $.post(\'getproquestions.php\',$(\'#form_addbccdinfo\').serialize(),function(data){
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
        if($(\'#pro_class\').val() == 0){
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

    function chknumber(flag){
        var result = false;
      param = $(\'#form_addbccdinfo\').serialize()+"&flag="+flag;
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
            $("input[type=\'checkbox\'][name!=\'exam_user\']:checked")
            .each(function(){
                  if(!strArr.in_array($(this).val())){
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
<div id="con_right">
  <div class="right_con">
    <div class="right_con_bt">·<?php echo $_GET['big_type']; ?>
 < <?php echo $_GET['small_type']; ?>
</div>
    <br />
    <br />
    <br />
    <DIV class="right_con_form">
      <form name="form_addbccdinfo" id="form_addbccdinfo" method="post" action="" enctype="multipart/form-data">
        <br />
        所属类别：
        <select name="pro_class" id="pro_class" onchange="changeProClass()">
          <option value=0>请选择</option>
    	    <?php echo $this->_tpl_vars['displayType']; ?>

        </select>
        <br />
        <br />
        试卷标题：
        <input type="text" id="title" name="title" size="65" class="input1" />
        <br/>
        <br/>
        开始时间：
        <select name="years" id="years">
          
       
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayYear'],'selected' => $this->_tpl_vars['years']), $this);?>

                
        
        </select>
        年
        <select name="months" id="months">
          
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayMonth'],'selected' => $this->_tpl_vars['months']), $this);?>

                
        
        </select>
        月
        <select name="days" id="days">
          
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayDay'],'selected' => $this->_tpl_vars['days']), $this);?>

                
        
        </select>
        日
        <select name="hours" id="hours">
          
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayHour'],'selected' => 9), $this);?>

                
        
        </select>
        时
        <select name="minutes" id="minutes">
          
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayMinute']), $this);?>

                
        
        </select>
        分
        <select name="seconds" id="seconds">
          
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arraySecond']), $this);?>

                
        
        </select>
        秒 <br />
        <br/>
        结束时间：
        <select name="year" id="year">
          
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayYear'],'selected' => $this->_tpl_vars['years']), $this);?>

                
        
        </select>
        年
        <select name="month" id="month">
          
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayMonth'],'selected' => $this->_tpl_vars['months']), $this);?>

                
        
        </select>
        月
        <select name="day" id="day">
          
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayDay'],'selected' => $this->_tpl_vars['days']), $this);?>

                
        
        </select>
        日
        <select name="hour" id="hour">
          
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayHour'],'selected' => 10), $this);?>

                
        
        </select>
        时
        <select name="minute" id="minute">
          
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayMinute'],'selected' => 30), $this);?>

                
        
        </select>
        分
        <select name="second" id="second">
          
          
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arraySecond']), $this);?>

                
        
        </select>
        秒 <br />
        <br/>
<!--        单选题：-->
<!--        <input name="rad" type="text" id="rad" size="5" value="20" class="input1" />-->
<!--        多选题：-->
<!--        <input name="che" type="text" id="che" size="5" value="10" class="input1" />-->
<!--        填空题：-->
<!--        <input name="fil" type="text" id="fil" size="5" value="10" class="input1" />-->
<!--        判断题：-->
<!--        <input name="jud" type="text" id="jud" size="5" value="4" class="input1" />-->
<!--        简答题：-->
<!--        <input name="ans" type="text" id="ans" size="5" value="8" class="input1" />-->
<!--        论述题：-->
<!--        <input name="dis" type="text" id="dis" size="5" value="2" class="input1" />-->
        <br />
        <br />
        请选择考试模板：<select id="template" name="template">
            <option value="">请选择</option>
            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tb_template']), $this);?>

        </select>
          <br />
          <br />
        <input type="submit" name="submit2" id="submit2" value="随机生成试卷" onclick="return checkall(0)"/>
        <br />
        <br/>

      </form>
    </DIV>
    <BR>
  </div>
</div>