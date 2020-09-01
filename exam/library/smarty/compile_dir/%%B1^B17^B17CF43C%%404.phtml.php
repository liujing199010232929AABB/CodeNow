<?php /* Smarty version 2.6.19, created on 2013-08-06 15:21:44
         compiled from 404.phtml */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <title>提示-编程词典服务网</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/style1.css" /> 
        <style type="text/css">
            .header_top                                 {width:100%; height:80px; background:url(<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/img/user_top_bg.gif); clear:both;}
            .header_top .logo                           {width:880px; clear:both;}
            .header_top .logo .left                     {width:300px; height:80px; background-color:#FFFFFF; float:left;}
            .header_top .logo .right                    {width:550px; height:80px; float:right;}
            .error_top                                  {width:769px; height:26px; background:url(<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/img/user_reg_top.gif); clear:both;}  
            .error_center                               {width:769px; background:url(<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/img/user_reg_center.gif); clear:both;}  
            .error_center .left                         {position:relative; width:30%; float:left;} 
            .error_center .right                        {width:69%; text-align:left; line-height:30px; float:right;} 
            .error_bottom                               {width:769px; height:35px; background:url(<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/img/user_reg_bottom.gif); clear:both;} 
            .error_errMsg                               {width:720px; height:30px; font-size:14px; color:#0000FF; line-height:30px; background-color:#FCD9D7; border:1px dashed #FF0000; clear:both;}
            .footer_msg                                 {width:763px; height:31px; line-height:31px; text-align:left; background:url(<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/img/user_bottom_bg.gif); clear:both;}
    
        </style>
    </head>
    <body>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/>

        
        <div class="error_top"></div>
        <div class="error_center">
            <div class="left">
                <img src="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/img/mark_unlogin.gif" />
            </div>
            
            <div class="right">
                <font style="font-size:18px; color:#2BA007; font-weight:bold;"> 对不起，您浏览的网页可能已被删除或暂时不可用！</font><br/>
                您可以：<br/>
                （１）　查看网址是否正确<br/>
                （２）　浏览其他页面：<a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/" class="a3">首页</a>
           <br/>
           <span id="t" style="color: #FF0000; font-size:15px; font-weight:bold;">5</span>　秒钟后将重定向到编程词典网首页！
           
           
            </div>
           
            <div class="clear"></div>   
           
        </div>
        <div class="error_bottom"></div>
        
        <div class="cell_h"></div>

        <script language="javascript">
        var i=5;

        function fun(){
             if(i==0){
                  window.location.href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/";
             }else{

             i--; 
             document.getElementById("t").innerHTML=i;
             }
        }
        setInterval("fun()", 1000);
        

        </script>
        
        
        
    </body>
</html>