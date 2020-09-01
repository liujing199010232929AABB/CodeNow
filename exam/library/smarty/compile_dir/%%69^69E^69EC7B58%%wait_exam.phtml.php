<?php /* Smarty version 2.6.19, created on 2016-09-27 17:13:59
         compiled from wait_exam.phtml */ ?>
<script type="text/javascript" src="Scripts/jquery-1.4.2.js"></script>

<script type="text/javascript">

    <!-- 获取服务器时间 -->

$(document).ready(function aafun(){

   $.post("times.php",function(tim){

	if(tim<"<?php echo $this->_tpl_vars['before_time']; ?>
" ){
		alert('考试系统未开通，请开通后在登录');
		window.close();
	}else if(tim>"<?php echo $this->_tpl_vars['before_time']; ?>
" && tim<"<?php echo $this->_tpl_vars['start_time']; ?>
" ){
		var sed=(<?php echo $this->_tpl_vars['start_time']; ?>
-tim)%60 ;
		if(sed==0){
			var as=(<?php echo $this->_tpl_vars['start_time']; ?>
-tim)/60 ;
			var ad=as + ": 00" ;
		}else{
			var as=parseInt((<?php echo $this->_tpl_vars['start_time']; ?>
-tim)/60);
			var ad=as + ": " + sed;
		}
		var wait='考试在'+ad+' 分钟后开始，请等待！';
		document.getElementById("tm").innerHTML = wait;						//将获取的当前时间赋值给指定的Div标签
	}else if(tim>"<?php echo $this->_tpl_vars['start_time']; ?>
" && tim<"<?php echo $this->_tpl_vars['after_time']; ?>
" && tim<"<?php echo $this->_tpl_vars['game_over']; ?>
"){		//判断考试的开始时间，如果当前时间与系统设定时间相同，则开始考试
		window.open('exam.php?examination_id=<?php echo $_SESSION['exam_id']; ?>
');
		window.close();
	}else if(tim>"<?php echo $this->_tpl_vars['after_time']; ?>
" && tim<"<?php echo $this->_tpl_vars['game_over']; ?>
" ){
		alert('考试已经开始超过15分钟，您不得进入考场');
		window.close();
	}else if(tim>"<?php echo $this->_tpl_vars['game_over']; ?>
"){
		alert('考试已经结束！');
		window.close();
	} 	


});

   setTimeout("aafun()",1000) ;

});
</script>
<DIV id=tm></DIV>