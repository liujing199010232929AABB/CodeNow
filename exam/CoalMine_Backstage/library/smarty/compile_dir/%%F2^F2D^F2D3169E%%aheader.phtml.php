<?php /* Smarty version 2.6.19, created on 2016-09-27 10:36:59
         compiled from aheader.phtml */ ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>煤矿考试后台-管理中心</title>
</head>
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/reset.css" rel="stylesheet" type="text/css" />
<body>
<div id="box"> 
  <!--头部开始 -->
  <div id="top" class="ac">
    <div class="top_right"><span class="font1"><a href="logout.php">退出系统</a></span> <span class="font2"><?php echo $_SESSION['back_name']; ?>
 （
    <?php if ($_SESSION['permissions'] == 0): ?>
    员工
		<?php elseif ($_SESSION['permissions'] == 1): ?>    
      队长  
        <?php elseif ($_SESSION['permissions'] == 2): ?>    
        管理员
        <?php elseif ($_SESSION['permissions'] == 3): ?>    
    超级管理员
    <?php endif; ?>
    ） 欢迎登录，您上次登录的时间为：<?php echo $_SESSION['last_login_date']; ?>
</span> </div>
  </div>
  <!--头部结束 --> 
  </div>
</body>
</html>