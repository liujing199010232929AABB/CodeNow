<?php /* Smarty version 2.6.19, created on 2016-10-08 11:19:03
         compiled from Special_exams.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'delbr', 'Special_exams.phtml', 129, false),)), $this); ?>
<!--内容开始 -->
<script type="text/javascript" src="Scripts/jquery-1.4.2.js"></script>
<form name="form_addbccdinfo" id="form_addbccdinfo" method="post" action="" >

  <div id="sub">
    <div id="sub_left">
      <div class="left_zl">
        <div class="left_zl_1">
          <div class="left_zl_1_t"><img src="images/63.jpg" alt="" /></div>
          <div class="left_zl_1_c">
            <div class="left_zl_a">
              <div class="left_zl_a_img"><img src="images/50.jpg" width="145" height="174" alt="" /></div>
              <div class="left_zl_a_t">您的得分：<?php echo $this->_tpl_vars['fraction']; ?>
</div>
            </div>
            <div class="left_zl_a">
              <div class="left_zl_a_b">
                <ul>
                  <li><span class="font9">考核类型：<?php echo $this->_tpl_vars['pro_class']; ?>
</span></li>
                </ul>
              </div>
            </div>
            <div class="left_zl_a">
              <div class="left_zl_a_c">
                <div class="left_zl_xs">
                        <a href="#radio"><img src="images/58.jpg" alt="" border="0" /></a>
                        <a href="#judgment"><img src="images/59.jpg" alt="" border="0" /></a>
<!--                	<input type="image" name="submit" id="submit" src="images/52.jpg" />-->
                </div>
              </div>
            </div>
            <div class="left_zl_b">
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
                  function checkinput(id,type){//定义验证用户输入的函数
                      if(type == \'checkbox\'){//如果题目类型是多选题
                          b = document.getElementsByName(type+id+"[]");//获取指定name属性值的元素
                      }else{
                          b = document.getElementsByName(type+id);//获取指定name属性值的元素
                      }

                      var flag = 0;//定义变量并初始化
                      for(var i=0;i< b.length;i++){
                          if(b[i].checked == true){//如果用户选择了答案
                              flag = 1;//将变量赋值为1
                          }
                      }
                      if(flag == 0){//如果用户未选择答案
                          alert("请选择您的答案！");//弹出提示信息
                          return false;//返回false
                      }else{
                          createInputHidden(id);//创建隐藏域
                          return true;//返回true
                      }
                  }
                  function checkanswer(id,type){
                      b = document.getElementById(type+id);

                      if(b.value == \'\'){
                          alert("请填写您的答案！");
                          return false;
                      }else{
                          createInputHidden(id);
                          return true;
                      }
                  }


                  function playSound(hid,src){
                    var s = document.getElementById(hid);
                      s.outerHTML = "<audio src=\'"+src+"\' controls autoplay id="+hid+" style=\'display:none\'></audio>";
                  }
                  '; ?>

                      function createInputHidden(id){//定义创建隐藏域的函数
                          var h = document.createElement("input");//创建input元素
                          h.setAttribute("type","hidden");//设置input元素type属性值
                          h.setAttribute("name","hid");//设置input元素name属性值
                          h.setAttribute("value",id);//设置input元素value属性值
                          document.form_addbccdinfo.appendChild(h);//向表单中添加元素
                          document.form_addbccdinfo.action = "Special_exams.php?pro_class=<?php echo $this->_tpl_vars['pro_claes']; ?>
&pro_type=<?php echo $this->_tpl_vars['pro_type']; ?>
#"+id;//设置表单action属性值
                      }
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
          <div class="sub_c_bt" style="padding-top:12px; color:#000000; line-height:20px; font-size:14px; font-weight:bold; text-align:center;"><?php echo $this->_tpl_vars['pro_class']; ?>
  专项练习<a name="radio"></a></div>
          <div class="">
             <?php 
                $i=0;
            
                 ?>
                <p><?php if ($this->_tpl_vars['Radio'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; margin-left:50px;line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;">
            专项练习： 单选题（选择一个正确答案字母）每题<?php echo $this->_tpl_vars['radioFraction']; ?>
分，共<?php echo $this->_tpl_vars['Radios']; ?>
题</span></li>
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
              <div style="width:660px; margin-left:50px;float:left;padding-left: 11px;padding-right: 5px; margin-bottom:5px; border:1px solid #19b10a; font-weight:bold;">

              <span class=""> <span class="kt_t"> <?php $this->assign('ss', $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['content']); ?>  <?php 
                $i++;
                echo $i;
                echo "<a name=" .$i. "></a>";

                 ?>、
                  <audio src='' controls autoplay id='' style='display: none'></audio>
                  <a name="<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
"></a>
                  <a href="javascript:void(0);" onclick="playSound('<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['sound']; ?>
')"><img src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/images/sound.png" /> </a>
                  <input type="hidden" name="i[]" value="radio@<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
@<?php echo $i; ?>">
                <?php echo delbr(array('str' => $this->_tpl_vars['ss']), $this);?>
</span> </span> <span class="kt_a">
                  <?php if ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 6): ?> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="D" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">D</span><span class="kt_a_1">
                  <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="E" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">E</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="F" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">F</span>
                  <?php elseif ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 5): ?> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="D" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">D</span><span class="kt_a_1">
                  <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="E" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                  </span><span class="kt_a_1">E</span>
                  <?php elseif ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 4): ?> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="D" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">D</span>

                  <?php elseif ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['search_list'] == 3): ?> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="C" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">C</span><span style="padding-left: 65px;"></span> <?php else: ?> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="A" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1">
                <input type="radio" name="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="B" id="radio<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">B</span> <?php endif; ?>
              <span style="padding-left: 65px;"><input type="image" name="submit<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
" id="submit" src="images/Subtj.jpg" onclick="return checkinput('<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['id']; ?>
','radio')"/></span></span> </li>
             </div>
              <?php if ($this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['right_error'] != ""): ?>
              <embed src="<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['sounds']; ?>
" style="width:1%;height: 1%" />
                <li> <div style="width:660px; margin-left:50px;float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;">您的答案：<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['sub']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['right_error']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;正确答案：<?php echo $this->_tpl_vars['arrayRadio'][$this->_sections['rad_id']['index']]['answer']; ?>
</div></li>
              <?php endif; ?>

              <?php endfor; endif; ?>
              <?php endif; ?>

              
              <?php if ($this->_tpl_vars['Checkbox'] == T): ?>

              <li> <div style="width:660px; float:left;margin-left: 50px; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;">
              专项练习： 多选题（选择两个或两个以上正确答案字母）每题<?php echo $this->_tpl_vars['checkboxFraction']; ?>
分，共<?php echo $this->_tpl_vars['Checkboxs']; ?>
题</div></li>
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
             <div style="width:660px; margin-left:50px;float:left;padding-left: 11px;padding-right: 5px; margin-bottom:5px; border:1px solid #19b10a; font-weight:bold;">

              <span class=""> <span class="kt_t"> <?php $this->assign('ss', $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['content']); ?><?php 
                $i++;
                echo $i;
                echo "<a name=" .$i. "></a>";
                 ?>、<audio src='' controls autoplay id='' style='display: none'></audio>
                  <a name="<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
"></a>
                  <a href="javascript:void(0);" onclick="playSound('<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['sound']; ?>
')"><img src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/images/sound.png" /> </a>
                <input type="hidden" name="i[]" value="checkbox@<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
@<?php echo $i; ?>">
                <?php echo delbr(array('str' => $this->_tpl_vars['ss']), $this);?>
</span> </span> <span class="kt_a">
                  <?php if ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 8): ?> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">D</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">E</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">F</span><span class="kt_a_1">
                  <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="G" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">G</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="H" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">H</span>
                  <?php elseif ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 7): ?> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">D</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">E</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">F</span><span class="kt_a_1">
                  <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="G" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                  </span><span class="kt_a_1">G</span>
                  <?php elseif ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 6): ?> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">D</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">E</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="F" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">F</span>
                  <?php elseif ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['search_list'] == 5): ?> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">D</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="E" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">E</span> <span style="padding-left: 68px;"></span><?php else: ?> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="A" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">A</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="B" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">B</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="C" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">C</span> <span class="kt_a_1">
                <input type="checkbox" name="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
[]" style=" margin-left:2px; margin-top:2px; float; display:inline;" value="D" id="checkbox<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1">D</span> <span style="padding-left: 133px;"></span><?php endif; ?>
              <span style="padding-left: 65px;"><input type="image"  id="submit" src="images/Subtj.jpg" onclick="return checkinput('<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['id']; ?>
','checkbox')"/></span>
              </span> </li></div>
                 <?php if ($this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['right_error'] != ""): ?>
              <embed src="<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['sounds']; ?>
" style="width:1%;height: 1%" />
                <li> <div style="width:660px; margin-left:50px;float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;">您的答案：<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['sub']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['right_error']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;正确答案：<?php echo $this->_tpl_vars['arrayCheckbox'][$this->_sections['chk_id']['index']]['answer']; ?>
</div></li>
                <?php endif; ?>
              <?php endfor; endif; ?>
              <?php endif; ?>
              
              <?php if ($this->_tpl_vars['Fill'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 专项练习： 填空题（每空<?php echo $this->_tpl_vars['fillFraction']; ?>
分，共<?php echo $this->_tpl_vars['Fills']; ?>
题）</span></li>
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
              <li> <span class="kt" style="background-color:#FFFFFF; border:1px dashed #FF6600; color:#333333;"> <span style="padding-top:4px; float:left;"> <?php 
         
                $i++;
                echo $i;
                     echo "<a name=" .$i. "></a>";
                 ?>、
              <input type="hidden" name="i[]" value="fill@<?php echo $this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['id']; ?>
@<?php echo $i; ?>">
            <?php echo $this->_reg_objects['util'][0]->mreplace($this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['content'],$this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['id']);?>

             
              </span> </span></li>
              <?php if ($this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['right_error'] != ""): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;">正确答案：<?php echo $this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['answer']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;您的答案：<?php echo $this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['sub']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayFill'][$this->_sections['fil_id']['index']]['right_error']; ?>
</span></li>
              <?php endif; ?>
              <?php endfor; endif; ?>
              <?php endif; ?>
              
              <?php if ($this->_tpl_vars['Judgment'] == T): ?>
              <li> <div style="width:660px;margin-left:50px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 专项练习： 判断题（正确的选正确；错误的选错误）每题<?php echo $this->_tpl_vars['judgmentFraction']; ?>
分，共<?php echo $this->_tpl_vars['Judgments']; ?>
题</div> </li>
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

              <div style="width:660px; margin-left:50px;float:left; padding-left:13px; line-height:28px; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;">

              <span class="kt1"> <span class="kt_t"> <?php 
            
                $i++;
                echo $i;
                  echo "<a name=" .$i. "></a>";
                 ?>、<audio src='' controls autoplay id='' style='display: none'></audio>
                  <a name="<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
"></a>
                  <a href="javascript:void(0);" onclick="playSound('<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['sound']; ?>
')"><img src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/images/sound.png" /> </a>
                   <input type="hidden" name="i[]" value="judgment@<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
@<?php echo $i; ?>">
                <?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['content']; ?>
</span> </span> 
                <!--  <span class="kt_a">
            
                        <span class="kt_a_2">A.接口是一种用来定义程序的协议</span>                    </span>--> 
                <span class="kt_a"> <span class="kt_a_1">
                <input type="radio" name="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="正确" id="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="width:55px;font-size: 22px;">正确</span><span class="kt_a_1">
                <input type="radio" name="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
" style="margin-top:2px; margin-left:2px; float:left; display:inline;" value="错误" id="judgment<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
">
                </span><span class="kt_a_1" style="width:55px;font-size: 22px;">错误</span>
                <span style="padding-left: 65px;"><input type="image"  id="submit" src="images/Subtj.jpg" onclick="return checkinput('<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['id']; ?>
','judgment')"/></span>
                </span></li></div>
                    <?php if ($this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['right_error'] != ""): ?>
              <embed src="<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['sounds']; ?>
" style="width:1%;height: 1%" />
                 <li> <div style="width:660px; margin-left:50px;float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;">您的答案：<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['sub']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['right_error']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;正确答案：<?php echo $this->_tpl_vars['arrayJudgment'][$this->_sections['jud_id']['index']]['answer']; ?>
</div></li>
                 <?php endif; ?>
              <?php endfor; endif; ?>
              <?php endif; ?>
              </p>
              <p> </p>

              <p><?php if ($this->_tpl_vars['Explain'] == T): ?>
              <li> <div style="width:660px; margin-left:50px;float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 专项练习： 名词解释（每题<?php echo $this->_tpl_vars['explainFraction']; ?>
分，共<?php echo $this->_tpl_vars['Explains']; ?>
题）</div></li>

              <?php unset($this->_sections['exp_id']);
$this->_sections['exp_id']['name'] = 'exp_id';
$this->_sections['exp_id']['loop'] = is_array($_loop=$this->_tpl_vars['arrayExplain']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exp_id']['show'] = true;
$this->_sections['exp_id']['max'] = $this->_sections['exp_id']['loop'];
$this->_sections['exp_id']['step'] = 1;
$this->_sections['exp_id']['start'] = $this->_sections['exp_id']['step'] > 0 ? 0 : $this->_sections['exp_id']['loop']-1;
if ($this->_sections['exp_id']['show']) {
    $this->_sections['exp_id']['total'] = $this->_sections['exp_id']['loop'];
    if ($this->_sections['exp_id']['total'] == 0)
        $this->_sections['exp_id']['show'] = false;
} else
    $this->_sections['exp_id']['total'] = 0;
if ($this->_sections['exp_id']['show']):

            for ($this->_sections['exp_id']['index'] = $this->_sections['exp_id']['start'], $this->_sections['exp_id']['iteration'] = 1;
                 $this->_sections['exp_id']['iteration'] <= $this->_sections['exp_id']['total'];
                 $this->_sections['exp_id']['index'] += $this->_sections['exp_id']['step'], $this->_sections['exp_id']['iteration']++):
$this->_sections['exp_id']['rownum'] = $this->_sections['exp_id']['iteration'];
$this->_sections['exp_id']['index_prev'] = $this->_sections['exp_id']['index'] - $this->_sections['exp_id']['step'];
$this->_sections['exp_id']['index_next'] = $this->_sections['exp_id']['index'] + $this->_sections['exp_id']['step'];
$this->_sections['exp_id']['first']      = ($this->_sections['exp_id']['iteration'] == 1);
$this->_sections['exp_id']['last']       = ($this->_sections['exp_id']['iteration'] == $this->_sections['exp_id']['total']);
?>

              <div style="width:660px; margin-left:50px;float:left; padding-left:13px; line-height:28px; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;">

               <span class="kt1"> <span class="kt_t" style="width: 625px;"> <?php 

                $i++;
                echo $i;
                  echo "<a name=" .$i. "></a>";
                 ?>、<audio src='' controls autoplay id='' style='display: none'></audio>
                   <a name="<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['id']; ?>
"></a>
                  <a href="javascript:void(0);" onclick="playSound('<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['sound']; ?>
')"><img src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/images/sound.png" /> </a>
                <span style="word-wrap: break-word;"><?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['content']; ?>
</span> </span> </span> <span style="float:left; padding-left:25px;">
               <?php if ($this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['right_error'] == ""): ?>
                <textarea name="explain<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['id']; ?>
" id="explain<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['id']; ?>
" style="width:590px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:200px;" cols="" rows=""></textarea>

                  <span style="padding-left: 260px;"><input type="image"  id="submit" src="images/Subtj.jpg" onclick="return checkanswer('<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['id']; ?>
','explain')"/></span>
                  <?php endif; ?>
              </span> </li></div>
              <?php if ($this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['right_error'] != ""): ?>
              <embed src="<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['sounds']; ?>
" style="width:1%;height: 1%" />
              <li> <div style="word-wrap: break-word;width:650px; margin-left:50px;float:left; padding-left:13px; padding-right:10px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; ">您的答案：<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['sub']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['right_error']; ?>
</div></li>
              <li> <div style="word-wrap: break-word;width:650px;margin-left:50px; float:left; padding-left:13px; padding-right:10px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; ">正确答案：<?php echo $this->_tpl_vars['arrayExplain'][$this->_sections['exp_id']['index']]['answer']; ?>
</div></li>
              <?php endif; ?>

              <?php endfor; endif; ?>
              <?php endif; ?>


              <p><?php if ($this->_tpl_vars['Answer'] == T): ?>
              <li> <div style="width:660px;margin-left:50px; float:left; padding-left:13px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 专项练习： 简答题（每题<?php echo $this->_tpl_vars['answerFraction']; ?>
分，共<?php echo $this->_tpl_vars['Answers']; ?>
题）</div></li>

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
              <div style="width:660px;margin-left:50px; float:left; padding-left:13px; line-height:28px; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;">

              <span class="kt1"> <span class="kt_t" style="width: 625px;"> <?php 
            
                $i++;
                echo $i;
                  echo "<a name=" .$i. "></a>";
                 ?>、<audio src='' controls autoplay id='' style='display: none'></audio>
                  <a name="<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['id']; ?>
"></a>
                  <a href="javascript:void(0);" onclick="playSound('<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['sound']; ?>
')"><img src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/images/sound.png" /> </a>
                <span style="word-wrap: break-word;"><?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['content']; ?>
</span> </span> </span> <span style="float:left; padding-left:25px;">
               <?php if ($this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['right_error'] == ""): ?>
                <textarea name="answer<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['id']; ?>
" id="answer<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['id']; ?>
" style="width:590px; padding-left:5px; float:left; line-height:25px; border:1px solid #AAAAAA; height:200px;" cols="" rows=""></textarea>

                  <span style="padding-left: 260px;"><input type="image"  id="submit" src="images/Subtj.jpg" onclick="return checkanswer('<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['id']; ?>
','answer')"/></span>
                  <?php endif; ?>
              </span> </li></div>
              <?php if ($this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['right_error'] != ""): ?>
              <embed src="<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['sounds']; ?>
" style="width:1%;height: 1%" />
              <li> <div style="word-wrap: break-word;margin-left:50px;width:650px; float:left; padding-left:13px; padding-right:10px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; ">正确答案：<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['answer']; ?>
</div></li>
              <li> <div style="word-wrap: break-word;margin-left:50px;width:650px; float:left; padding-left:13px; padding-right:10px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; ">您的答案：<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['sub']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayAnswer'][$this->_sections['ans_id']['index']]['right_error']; ?>
</div></li>
              <?php endif; ?>

              <?php endfor; endif; ?>
              <?php endif; ?>

              <?php if ($this->_tpl_vars['Discourse'] == T): ?>
              <li> <span style="width:660px; float:left; padding-left:13px; line-height:28px; background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; font-weight:bold;"> 专项练习： 论述题（每题<?php echo $this->_tpl_vars['discourseFraction']; ?>
分，共<?php echo $this->_tpl_vars['Discourses']; ?>
题）</span></li>
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
                     <?php if ($this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['right_error'] != ""): ?>
                    <li> <span style="width:660px; float:left; padding-left:13px; padding-right:10px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; ">正确答案：<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['answer']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
                    <li> <span style="width:660px; float:left; padding-left:13px; padding-right:10px; line-height:28px;  background-color:#ffffff;  color:#000000; margin-bottom:5px; display:inline; border:1px solid #19b10a; ">您的答案：<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['sub']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayDiscourse'][$this->_sections['dis_id']['index']]['right_error']; ?>
</span></li>
                    <?php endif; ?>
              <?php endfor; endif; ?>
              <?php endif; ?>
          </div>
<!--          <div class="k_x"><a name="judgment"></a>-->
<!--          	<input type="image" name="submit" id="submit" src="images/SubPager.jpg" />-->
<!--          </div>-->
        </div>
      </div>
    </div>
  </div>
</form>
<!--内容结束 --> 