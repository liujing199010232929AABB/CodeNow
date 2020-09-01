<?php /* Smarty version 2.6.19, created on 2012-10-31 10:48:25
         compiled from random_exam.phtml */ ?>
<script type="text/javascript" src="Scripts/jquery-1.4.2.js"></script>
<SCRIPT language=javascript>
window.onbeforeunload = function(){	//完成退出操作
	var n = window.event.screenX - window.screenLeft;
	var b = n > document.documentElement.scrollWidth-20;
	if(b && window.event.clientY < 0 || window.event.altKey){
		window.event.returnValue="  退出考试系统?  ";
	}
	//else{
	//	alert("是刷新而非关闭");
	//}
}

function SubPaper(){
	if(window.confirm("\n\n\t  提交试卷后将不能修改答案！\n\n\t  确实要提交试卷吗?  \n\n\n点  [确定]  提交试卷,  点  [取消]  返回试卷  \t\n\n")){
		return true;
	}else{
		return false;
	}
}

function createSign(inputobj){
    signname = inputobj.name;
    sign = signname + inputobj.value;
    if($("div[id^="+signname+"][id$='rectdiv']").length != 0){
    $("div[id^="+signname+"][id$='rectdiv']").remove();
    }
    if($('#'+sign+'circlediv').length == 0){
    var objDiv = document.createElement('div');
    objDiv.id = sign +'circlediv';
    objDiv.className = 'circle';
    $('#'+sign).append(objDiv);
    }
}

function createEnd(inputobj){
    signname = inputobj.name;
    sign = signname + inputobj.value;
    $("#"+sign+'circlediv').remove();
    if($("div[id^="+signname+"][id$='rectdiv']").length == 0){
    var objDiv = document.createElement('div');
    objDiv.id = sign+'rectdiv';
    objDiv.className = 'rectangle';
    $('#'+sign).append(objDiv);
    }
}

function createCheckboxSign(inputobj){
    signid = inputobj.id;
    sign = signid + inputobj.value;
    if($('#'+sign+'circlediv').length == 0){
    var objDiv = document.createElement('div');
    objDiv.id = sign +'circlediv';
    objDiv.className = 'circle';
    $('#'+sign).append(objDiv);
    }
}

function createCheckboxEnd(inputobj){
    signid = inputobj.id;
    sign = signid + inputobj.value;
    if($('#'+sign+'circlediv').length != 0){
        $('#'+sign+'circlediv').remove();
    }
    if($('#'+sign+'rectdiv').length == 0){
        var objDiv = document.createElement('div');
        objDiv.id = sign+'rectdiv';
        objDiv.className = 'rectangle';
        $('#'+sign).append(objDiv);
    }
    if($('#'+sign+'rectdiv').length != 0){
        if($('#'+signid).attr("checked") == true){
            $('#'+sign+'rectdiv').remove();
        }
    }
}
</SCRIPT>
<!--内容开始 -->
<form name="form_addbccdinfo" id="form_addbccdinfo" method="post" action="">

  <div id="sub">
    <div id="sub_left">
      <div class="left_zl">
        <div class="left_zl_1">
          <div class="left_zl_1_t"><img src="images/63.jpg" alt="" /></div>
          <div class="left_zl_1_c">
            <div class="left_zl_a">
              <div class="left_zl_a_img"><img src="CoalMine_Backstage/<?php echo $_SESSION['picture']; ?>
" width="145" height="174" alt="" /></div>
              <div class="left_zl_a_t" id="sparetime"> 
<script type="text/javascript" src="Scripts/createxmlhttp.js"></script>
<script type="text/javascript">
time = window.setInterval("sparetime()",1000);								//重复更新
function sparetime(){
	xmlHttp.open("post","sparetime.php", true);
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			tet = xmlHttp.responseText;
			if(tet=="剩余时间：00:00:00"){
				alert('考试时间到，系统将自动交卷！');
				form_addbccdinfo.submit();					
			}
			document.getElementById("sparetime").innerHTML = tet;	
		}
	}
	xmlHttp.send(null);
}
</script>
              </div>
            </div>
            <div class="left_zl_a">
              <div class="left_zl_a_b">
                <ul>
                  <li><span class="font9">考生姓名：</span><span class="font10"><?php echo $_SESSION['name']; ?>

                    <input type="hidden" name="name" id="name" value="<?php echo $_SESSION['name']; ?>
" />
                  </span></li>
                  <li><span class="font9">准考证号：</span><span class="font10"><?php echo $_SESSION['admission']; ?>

                  <input type="hidden" name="admission" id="admission" value="<?php echo $_SESSION['admission']; ?>
" />
                  </span></li>
                  <li><span class="font9">考核类型：</span><span class="font10"><?php echo $_SESSION['typename']; ?>

                  <input type="hidden" name="pro_class" id="pro_class" value="<?php echo $_SESSION['userproid']; ?>
" />
                  </span></li>
                </ul>
              </div>
            </div>
            <div class="left_zl_a">
              <div class="left_zl_a_c">
                <div class="left_zl_xs"><input type="image" name="submit" id="submit" src="images/52.jpg" onclick="return SubPaper(this)" value="提交考卷"/></div>
              </div>
            </div>
            <div class="left_zl_b">
              <ul>
                <li><a href="#radio"><img src="images/58.jpg" alt="" border="0" /></a></li>
                <li><a href="#judgment"><img src="images/59.jpg" alt="" border="0" /></a></li>
                <li><a href="#judgment"><img src="images/60.jpg" alt="" border="0" /></a></li>
                <li><a href="#radio"><img src="images/61.jpg" alt="" border="0" /></a></li>
                <li><a href="#checkbox"><img src="images/62.jpg" alt="" border="0" /></a></li>
              </ul>
                <div class="left_zl_xs">&nbsp;&nbsp;<input type="button" name="checkpaper" value="检查试卷" onclick="checkanswer()" /></div>
                <div class="left_zl_b" id="answerstate"></div>
            </div>
              <script>
                  <?php echo '
                  function checkanswer(){
                      $.ajax({
                          url:"answerstates.php",
                          type:"post",
                          data:$(\'#form_addbccdinfo\').serialize(),
                          success:function(res){
                              $(\'#answerstate\').html(res);
                          }
                      });
                  }
                  '; ?>

              </script>
            <div class="left_zl_c" style="display:none" id="one">
              <ul>
                <li><?php echo $this->_tpl_vars['answer']; ?>
</li>
              </ul>
            </div>
          </div>
          <div class="left_zl_1_t"><img src="images/64.jpg" alt="" /></div>
        </div>
      </div>
    </div>
    <div id="sub_right">
      <div class="right">
        <div class="sub_c" style="padding-bottom:20px;">
          <div class="sub_c_bt" style="padding-top:12px; color:#000000; line-height:10px; font-size:14px; font-weight:bold; text-align:center;"><span style="text-align: center"><?php echo $this->_tpl_vars['examination'][0]['title']; ?>
</span>
              <span style="margin-left:600px;font-size:12px"><a href="#" onclick="javascript:window.location.reload();">刷新</a> &nbsp;<a href="#" onclick="if(confirm('确实要退出考试吗？'))window.close();">退出</a></span>
              <div style="padding-left: 550px;padding-top: 15px">总分：100分</div>
              <input type="hidden" name="title" id="title" value="<?php echo $this->_tpl_vars['examination'][0]['title']; ?>
" /><br />
              <span style=" color:#ff6101; font-weight:normal; padding-top:8px;padding-right:30px; font-size:12px; float:right;" id="sparetimes"><script type="text/javascript">
times = window.setInterval("sparetimes()",1000);								//重复更新
function sparetimes(){
	xmlHttp.open("post","sparetimes.php", true);
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			tet = xmlHttp.responseText;
			document.getElementById("sparetimes").innerHTML = tet;	
		}
	}
	xmlHttp.send(null);
}
</script></span> </div>
          <div class="k_con">
            <ul>
              <li> <?php 
                $i=0;
                $m=0;
                 ?>
                <p><?php if ($this->_tpl_vars['Radio'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> <?php 
                $m++;
                switch($m){
                case "1":
                $n="一";
                break;
                case "2":
                $n="二";
                break;
                case "3":
                $n="三";
                break;
                case "4":
                $n="四";
                break;
                case "5":
                $n="五";
                break;
                case "6":
                $n="六";
                break;
                }
                echo $n;
                 ?>、 单选题（选择一个正确答案字母）每题<?php echo $this->_tpl_vars['radioFraction']; ?>
分，共<?php echo $this->_tpl_vars['Radios']; ?>
题</span><a name="radio"></a> </li>
              <?php unset($this->_sections['rad_id']);
$this->_sections['rad_id']['name'] = 'rad_id';
$this->_sections['rad_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayRadio']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rad_id']['show'] = true;
$this->_sections['rad_id']['max'] = $this->_sections['rad_id']['loop'];
$this->_sections['rad_id']['step'] = 1;
$this->_sections['rad_id']['start'] = $this->_sections['rad_id']['step'] > 0 ? 0 : $this->_sections['rad_id']['loop']-1;
if ($this->_sections['rad_id']['show']) {
    $this->_sections['rad_id']['total'] = $this->_sections['rad_id']['loop'];
    if ($this->_sections['rad_id']['total'] == 0)
        $this->_sections['rad_id']['show'] = false;
} else
    $this->_sections['rad_id']['total'] = 0;
if ($this->_sections['rad_id']['show']):

            for ($this->_sections['rad_id']['index'] = $this->_sections['rad_id']['start'], $this->_sections['rad_id']['iteration'] = 1;
                 $this->_sections['rad_id']['iteration'] <= $this->_sections['rad_id']['total'];
                 $this->_sections['rad_id']['index'] += $this->_sections['rad_id']['step'], $this->_sections['rad_id']['iteration']++):
$this->_sections['rad_id']['rownum'] = $this->_sections['rad_id']['iteration'];
$this->_sections['rad_id']['index_prev'] = $this->_sections['rad_id']['index'] - $this->_sections['rad_id']['step'];
$this->_sections['rad_id']['index_next'] = $this->_sections['rad_id']['index'] + $this->_sections['rad_id']['step'];
$this->_sections['rad_id']['first']      = ($this->_sections['rad_id']['iteration'] == 1);
$this->_sections['rad_id']['last']       = ($this->_sections['rad_id']['iteration'] == $this->_sections['rad_id']['total']);
?>
              <li> <span class="kt" onmouseover="this.className='ktover'" onmouseout="this.className='kt'"> <span class="kt_t">   <?php 
                $i++;
                echo $i;
                echo "<a name=" .$i. "></a>";
              
                 ?>、
                  <input type="hidden" name="i[]" value="radio@<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
@<?php echo $i; ?>">
                <?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['content']; ?>
</span> </span> <span class="kt_a">
                  <?php if ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 6): ?> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
A'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
B'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
C'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
D'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="D" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">D</span><span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
E'>
                  <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="E" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">E</span> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
F'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="F" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">F</span>
                  <?php elseif ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 5): ?> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
C'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
D'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="D" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">D</span><span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
E'>
                  <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="E" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                  </span><span class="kt_a_1">E</span>
                  <?php elseif ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 4): ?> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
A'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
B'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
C'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
D'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="D" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">D</span>
                  <?php elseif ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 3): ?> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
A'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A"  onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
B'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
C'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">C</span> <?php else: ?> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
A'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1" id='radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
B'>
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1">B</span> <?php endif; ?> </span> </li>
              <?php endfor; endif; ?>
              <?php endif; ?>
              
              
              <?php if ($this->_tpl_vars['Checkbox'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> <?php 
                $m++;
                switch($m){
                case "1":
                $n="一";
                break;
                case "2":
                $n="二";
                break;
                case "3":
                $n="三";
                break;
                case "4":
                $n="四";
                break;
                case "5":
                $n="五";
                break;
                case "6":
                $n="六";
                break;
                }
                echo $n;
                 ?>、 多选题（选择两个或两个以上正确答案字母）每题<?php echo $this->_tpl_vars['checkboxFraction']; ?>
分，共<?php echo $this->_tpl_vars['Checkboxs']; ?>
题</span><a name="checkbox"></a> </li>
              <?php unset($this->_sections['chk_id']);
$this->_sections['chk_id']['name'] = 'chk_id';
$this->_sections['chk_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayCheckbox']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['chk_id']['show'] = true;
$this->_sections['chk_id']['max'] = $this->_sections['chk_id']['loop'];
$this->_sections['chk_id']['step'] = 1;
$this->_sections['chk_id']['start'] = $this->_sections['chk_id']['step'] > 0 ? 0 : $this->_sections['chk_id']['loop']-1;
if ($this->_sections['chk_id']['show']) {
    $this->_sections['chk_id']['total'] = $this->_sections['chk_id']['loop'];
    if ($this->_sections['chk_id']['total'] == 0)
        $this->_sections['chk_id']['show'] = false;
} else
    $this->_sections['chk_id']['total'] = 0;
if ($this->_sections['chk_id']['show']):

            for ($this->_sections['chk_id']['index'] = $this->_sections['chk_id']['start'], $this->_sections['chk_id']['iteration'] = 1;
                 $this->_sections['chk_id']['iteration'] <= $this->_sections['chk_id']['total'];
                 $this->_sections['chk_id']['index'] += $this->_sections['chk_id']['step'], $this->_sections['chk_id']['iteration']++):
$this->_sections['chk_id']['rownum'] = $this->_sections['chk_id']['iteration'];
$this->_sections['chk_id']['index_prev'] = $this->_sections['chk_id']['index'] - $this->_sections['chk_id']['step'];
$this->_sections['chk_id']['index_next'] = $this->_sections['chk_id']['index'] + $this->_sections['chk_id']['step'];
$this->_sections['chk_id']['first']      = ($this->_sections['chk_id']['iteration'] == 1);
$this->_sections['chk_id']['last']       = ($this->_sections['chk_id']['iteration'] == $this->_sections['chk_id']['total']);
?>
              <li> <span class="kt" onmouseover="this.className='ktover'" onmouseout="this.className='kt'"> <span class="kt_t"> <?php 
                $i++;
                echo $i;
                echo "<a name=" .$i. "></a>";
                 ?>、
                <input type="hidden" name="i[]" value="checkbox@<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
@<?php echo $i; ?>">
                <?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['content']; ?>
</span> </span> <span class="kt_a">
                  <?php if ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 8): ?> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
AA">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
BB">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
CC">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
DD">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">D</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
EE">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">E</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
FF">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="F" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">F</span><span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
GG">
                  <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="G" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">G</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
HH">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="H" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">H</span>
                  <?php elseif ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 7): ?> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
AA">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
A" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
BB">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
B" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
CC">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
C" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
DD">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
D" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">D</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
EE">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
E" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">E</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
FF">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
F" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">F</span><span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
GG">
                  <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="G" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
G" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                  </span><span class="kt_a_1">G</span>
                  <?php elseif ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 6): ?> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
AA">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
A" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
BB">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
B" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
CC">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
C" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
DD">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
D" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">D</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
EE">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
E" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">E</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
FF">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
F" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">F</span>
                  <?php elseif ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 5): ?> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
AA">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
A" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
BB">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
B" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
CC">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
C" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
DD">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
D" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">D</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
EE">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
E" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)">
                </span><span class="kt_a_1">E</span> <?php else: ?> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
AA">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
A" />
                </span><span class="kt_a_1">A</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
BB">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
B" />
                </span><span class="kt_a_1">B</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
CC">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
C" />
                </span><span class="kt_a_1">C</span> <span class="kt_a_1" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
DD">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" onmousedown="createCheckboxSign(this)" onmouseup="createCheckboxEnd(this)" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
D" />
                </span><span class="kt_a_1">D</span> <?php endif; ?> </span> </li>
              <?php endfor; endif; ?>
              <?php endif; ?>
              
              <?php if ($this->_tpl_vars['Fill'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> <?php 
                $m++;
                switch($m){
                case "1":
                $n="一";
                break;
                case "2":
                $n="二";
                break;
                case "3":
                $n="三";
                break;
                case "4":
                $n="四";
                break;
                case "5":
                $n="五";
                break;
                case "6":
                $n="六";
                break;
                }
                echo $n;
                 ?>、 填空题（每空<?php echo $this->_tpl_vars['fillFraction']; ?>
分，共<?php echo $this->_tpl_vars['Fills']; ?>
题）</span> <a name="fill"></a></li>
              <?php unset($this->_sections['fil_id']);
$this->_sections['fil_id']['name'] = 'fil_id';
$this->_sections['fil_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayFill']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['fil_id']['show'] = true;
$this->_sections['fil_id']['max'] = $this->_sections['fil_id']['loop'];
$this->_sections['fil_id']['step'] = 1;
$this->_sections['fil_id']['start'] = $this->_sections['fil_id']['step'] > 0 ? 0 : $this->_sections['fil_id']['loop']-1;
if ($this->_sections['fil_id']['show']) {
    $this->_sections['fil_id']['total'] = $this->_sections['fil_id']['loop'];
    if ($this->_sections['fil_id']['total'] == 0)
        $this->_sections['fil_id']['show'] = false;
} else
    $this->_sections['fil_id']['total'] = 0;
if ($this->_sections['fil_id']['show']):

            for ($this->_sections['fil_id']['index'] = $this->_sections['fil_id']['start'], $this->_sections['fil_id']['iteration'] = 1;
                 $this->_sections['fil_id']['iteration'] <= $this->_sections['fil_id']['total'];
                 $this->_sections['fil_id']['index'] += $this->_sections['fil_id']['step'], $this->_sections['fil_id']['iteration']++):
$this->_sections['fil_id']['rownum'] = $this->_sections['fil_id']['iteration'];
$this->_sections['fil_id']['index_prev'] = $this->_sections['fil_id']['index'] - $this->_sections['fil_id']['step'];
$this->_sections['fil_id']['index_next'] = $this->_sections['fil_id']['index'] + $this->_sections['fil_id']['step'];
$this->_sections['fil_id']['first']      = ($this->_sections['fil_id']['iteration'] == 1);
$this->_sections['fil_id']['last']       = ($this->_sections['fil_id']['iteration'] == $this->_sections['fil_id']['total']);
?>
              <li> <span class="kt" onmouseover="this.className='ktover'" onmouseout="this.className='kt'"> <span style="padding-top:4px; float:left;"> <?php 
         
                $i++;
                echo $i;
                     echo "<a name=" .$i. "></a>";
                 ?>、
               <input type="hidden" name="i[]" value="fill@<?php echo $this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['id']; ?>
@<?php echo $i; ?>">
            <?php echo $this->_reg_objects['util'][0]->mreplace($this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['content'],$this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['id']);?>

             
              </span> </span></li>
              <?php endfor; endif; ?>
              <?php endif; ?>
              
              <?php if ($this->_tpl_vars['Judgment'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> <?php 
                $m++;
                switch($m){
                case "1":
                $n="一";
                break;
                case "2":
                $n="二";
                break;
                case "3":
                $n="三";
                break;
                case "4":
                $n="四";
                break;
                case "5":
                $n="五";
                break;
                case "6":
                $n="六";
                break;
                }
                echo $n;
                 ?>、 判断题（正确的选正确；错误的选错误）每题<?php echo $this->_tpl_vars['judgmentFraction']; ?>
分，共<?php echo $this->_tpl_vars['Judgments']; ?>
题</span> <a name="judgment"></a></li>
              <?php unset($this->_sections['jud_id']);
$this->_sections['jud_id']['name'] = 'jud_id';
$this->_sections['jud_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayJudgment']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['jud_id']['show'] = true;
$this->_sections['jud_id']['max'] = $this->_sections['jud_id']['loop'];
$this->_sections['jud_id']['step'] = 1;
$this->_sections['jud_id']['start'] = $this->_sections['jud_id']['step'] > 0 ? 0 : $this->_sections['jud_id']['loop']-1;
if ($this->_sections['jud_id']['show']) {
    $this->_sections['jud_id']['total'] = $this->_sections['jud_id']['loop'];
    if ($this->_sections['jud_id']['total'] == 0)
        $this->_sections['jud_id']['show'] = false;
} else
    $this->_sections['jud_id']['total'] = 0;
if ($this->_sections['jud_id']['show']):

            for ($this->_sections['jud_id']['index'] = $this->_sections['jud_id']['start'], $this->_sections['jud_id']['iteration'] = 1;
                 $this->_sections['jud_id']['iteration'] <= $this->_sections['jud_id']['total'];
                 $this->_sections['jud_id']['index'] += $this->_sections['jud_id']['step'], $this->_sections['jud_id']['iteration']++):
$this->_sections['jud_id']['rownum'] = $this->_sections['jud_id']['iteration'];
$this->_sections['jud_id']['index_prev'] = $this->_sections['jud_id']['index'] - $this->_sections['jud_id']['step'];
$this->_sections['jud_id']['index_next'] = $this->_sections['jud_id']['index'] + $this->_sections['jud_id']['step'];
$this->_sections['jud_id']['first']      = ($this->_sections['jud_id']['iteration'] == 1);
$this->_sections['jud_id']['last']       = ($this->_sections['jud_id']['iteration'] == $this->_sections['jud_id']['total']);
?>
              <li> <span class="kt" onmouseover="this.className='ktover'" onmouseout="this.className='kt'"> <span class="kt_t"> <?php 

                $i++;
                echo $i;
                  echo "<a name=" .$i. "></a>";
                 ?>、
                  <input type="hidden" name="i[]" value="judgment@<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
@<?php echo $i; ?>">
                <?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['content']; ?>
</span> </span>
                  <!--  <span class="kt_a">

<span class="kt_a_2">A.接口是一种用来定义程序的协议</span>                    </span>-->
                <span class="kt_a"> <span class="kt_a_1" id='judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
正确'>
                <input type="radio" name="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="正确" id="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1" style="width:55px;">正确</span><span class="kt_a_1" id='judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
错误'>
                <input type="radio" name="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="错误" id="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
" onmousedown="createSign(this)" onmouseup="createEnd(this)">
                </span><span class="kt_a_1" style="width:55px;">错误</span></span></li>
              <?php endfor; endif; ?>
              <?php endif; ?>
              </p>
              <p> </p>
              <p><?php if ($this->_tpl_vars['Answer'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> <?php 
                $m++;
                switch($m){
                case "1":
                $n="一";
                break;
                case "2":
                $n="二";
                break;
                case "3":
                $n="三";
                break;
                case "4":
                $n="四";
                break;
                case "5":
                $n="五";
                break;
                case "6":
                $n="六";
                break;
                }
                echo $n;
                 ?>、 简答题（每题<?php echo $this->_tpl_vars['answerFraction']; ?>
分，共<?php echo $this->_tpl_vars['Answers']; ?>
题）</span><a name="answer"></a> </li>
              <?php unset($this->_sections['ans_id']);
$this->_sections['ans_id']['name'] = 'ans_id';
$this->_sections['ans_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayAnswer']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ans_id']['show'] = true;
$this->_sections['ans_id']['max'] = $this->_sections['ans_id']['loop'];
$this->_sections['ans_id']['step'] = 1;
$this->_sections['ans_id']['start'] = $this->_sections['ans_id']['step'] > 0 ? 0 : $this->_sections['ans_id']['loop']-1;
if ($this->_sections['ans_id']['show']) {
    $this->_sections['ans_id']['total'] = $this->_sections['ans_id']['loop'];
    if ($this->_sections['ans_id']['total'] == 0)
        $this->_sections['ans_id']['show'] = false;
} else
    $this->_sections['ans_id']['total'] = 0;
if ($this->_sections['ans_id']['show']):

            for ($this->_sections['ans_id']['index'] = $this->_sections['ans_id']['start'], $this->_sections['ans_id']['iteration'] = 1;
                 $this->_sections['ans_id']['iteration'] <= $this->_sections['ans_id']['total'];
                 $this->_sections['ans_id']['index'] += $this->_sections['ans_id']['step'], $this->_sections['ans_id']['iteration']++):
$this->_sections['ans_id']['rownum'] = $this->_sections['ans_id']['iteration'];
$this->_sections['ans_id']['index_prev'] = $this->_sections['ans_id']['index'] - $this->_sections['ans_id']['step'];
$this->_sections['ans_id']['index_next'] = $this->_sections['ans_id']['index'] + $this->_sections['ans_id']['step'];
$this->_sections['ans_id']['first']      = ($this->_sections['ans_id']['iteration'] == 1);
$this->_sections['ans_id']['last']       = ($this->_sections['ans_id']['iteration'] == $this->_sections['ans_id']['total']);
?>
              <li> <span class="kt"> <span class="kt_t"> <?php 
            
                $i++;
                echo $i;
                  echo "<a name=" .$i. "></a>";
                 ?>、
                <?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['content']; ?>
 </span> </span> <span style="float:left; padding-left:25px;">
                <textarea name="answer<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['id']; ?>
" id="answer<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['id']; ?>
" style="width:630px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:200px;" cols="" rows=""></textarea>
                </span> </li>
              <?php endfor; endif; ?>
              <?php endif; ?>
              
              <?php if ($this->_tpl_vars['Discourse'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px; background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> <?php 
                $m++;
                switch($m){
                case "1":
                $n="一";
                break;
                case "2":
                $n="二";
                break;
                case "3":
                $n="三";
                break;
                case "4":
                $n="四";
                break;
                case "5":
                $n="五";
                break;
                case "6":
                $n="六";
                break;
                }
                echo $n;
                 ?>、 论述题（每题<?php echo $this->_tpl_vars['discourseFraction']; ?>
分，共<?php echo $this->_tpl_vars['Discourses']; ?>
题）</span><a name="discourse"></a> </li>
              <?php unset($this->_sections['dis_id']);
$this->_sections['dis_id']['name'] = 'dis_id';
$this->_sections['dis_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayDiscourse']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dis_id']['show'] = true;
$this->_sections['dis_id']['max'] = $this->_sections['dis_id']['loop'];
$this->_sections['dis_id']['step'] = 1;
$this->_sections['dis_id']['start'] = $this->_sections['dis_id']['step'] > 0 ? 0 : $this->_sections['dis_id']['loop']-1;
if ($this->_sections['dis_id']['show']) {
    $this->_sections['dis_id']['total'] = $this->_sections['dis_id']['loop'];
    if ($this->_sections['dis_id']['total'] == 0)
        $this->_sections['dis_id']['show'] = false;
} else
    $this->_sections['dis_id']['total'] = 0;
if ($this->_sections['dis_id']['show']):

            for ($this->_sections['dis_id']['index'] = $this->_sections['dis_id']['start'], $this->_sections['dis_id']['iteration'] = 1;
                 $this->_sections['dis_id']['iteration'] <= $this->_sections['dis_id']['total'];
                 $this->_sections['dis_id']['index'] += $this->_sections['dis_id']['step'], $this->_sections['dis_id']['iteration']++):
$this->_sections['dis_id']['rownum'] = $this->_sections['dis_id']['iteration'];
$this->_sections['dis_id']['index_prev'] = $this->_sections['dis_id']['index'] - $this->_sections['dis_id']['step'];
$this->_sections['dis_id']['index_next'] = $this->_sections['dis_id']['index'] + $this->_sections['dis_id']['step'];
$this->_sections['dis_id']['first']      = ($this->_sections['dis_id']['iteration'] == 1);
$this->_sections['dis_id']['last']       = ($this->_sections['dis_id']['iteration'] == $this->_sections['dis_id']['total']);
?>
              <li> <span class="kt"> <span class="kt_t"> <?php 
           
                $i++;
                echo $i;
                   echo "<a name=" .$i. "></a>";
                 ?>、
                <?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['content']; ?>
</span> </span> <span style="float:left; padding-left:25px;">
                <textarea name="discourse<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['id']; ?>
" style="width:630px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:300px;" id="discourse<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['id']; ?>
" rows="15"></textarea>
                </span></li>
              <?php endfor; endif; ?>
              <?php endif; ?>
            </ul>
          </div>
          <div class="k_x">
          	<input type="image" name="submits" id="submits" src="images/SubPager.jpg" />
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<!--内容结束 --> 