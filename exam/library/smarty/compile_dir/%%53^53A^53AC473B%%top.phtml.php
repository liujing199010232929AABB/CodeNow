<?php /* Smarty version 2.6.19, created on 2016-12-01 09:23:53
         compiled from top.phtml */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>===煤矿考试系统===</title>
<link href="css/base.css" rel="stylesheet" type="text/css" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="Scripts/Effects.js" type="text/javascript"></script>
</head>
<script type="text/javascript">
function openNewWindow(theURL,winName,features) { //v2.0
	window.open(theURL,winName,features);
}

function chksearch(form){
	if(form.searches.value==''){
		alert('请输入查询关键字！');
        form.searches.focus();
        return false; 
   	}
    return true;
}

function closeParent(newurl){
    newWindow = window.open(newurl,"new","");
    window.opener = null;
    window.open("","_self");
    window.close();
}

</script>

<body onload="MM_preloadImages('images/b1.jpg','images/b2.jpg','images/b3.jpg','images/b4.jpg','images/b5.jpg','images/b6.jpg','images/b7.jpg','images/35.jpg','images/53.jpg','images/55.jpg','images/57.jpg')">
<div id="box">
<!--头部开始 -->
	<div id="z_top">

    </div>
    <div id="nav">
        <ul>
            <li><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','images/b1.jpg',1)"><img src="images/a1.gif" name="Image2" width="120" height="62" border="0" id="Image2" /></a></li>
            <li><a href="Training.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','images/b2.jpg',1)"><img src="images/a2.jpg" name="Image3" width="120" height="62" border="0" id="Image3" /></a></li>
            <li><a href="#" onclick="openNewWindow('Special_exercises.php','','width=490,height=340')" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','images/b4.jpg',1)"><img src="images/a4.jpg" name="Image5" width="120" height="62" border="0" id="Image5" /></a></li>
            <li><a href="<?php if ($_SESSION['name'] == ''): ?># <?php else: ?>Random_Answer.php<?php endif; ?>"   <?php if ($_SESSION['name'] == ''): ?>onclick="openNewWindow('random_login.php','','width=490,height=340')"<?php endif; ?> onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','images/b3.jpg',1)"><img src="images/a3.jpg" name="Image4" width="120" height="62" border="0" id="Image4" /></a></li>
            <li><a href="#" onclick="openNewWindow('logins.php','','width=490,height=370')" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','images/b5.jpg',1)"><img src="images/a5.jpg" name="Image6" width="120" height="62" border="0" id="Image6" /></a></li>
            <li><a href="#" onclick="openNewWindow('login.php','','width=490,height=370')" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','images/b6.jpg',1)"><img src="images/a6.jpg" name="Image7" width="120" height="62" border="0" id="Image7" /></a></li>
            <li><a href="#" onclick="openNewWindow('search_examination.php','','width=490,height=370')" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','images/b7.jpg',1)"><img src="images/a7.jpg" name="Image8" width="120" height="62" border="0" id="Image8" /></a></li>
            <li><a href="#" onclick="window.open('search_log.php')" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','images/b8.jpg',1)"><img src="images/a8.jpg" name="Image9" width="120" height="62" border="0" id="Image9" /></a></li>
            <!--  <li style="background-color: #f0eeef;height: 56px;"><form name="form_search" method="post" action="search_Training.php" onsubmit="return chksearch(this)" >-->
            <!--          <input name="searches" class="top_right_a" type="text" />-->
            <!--              <input type="image" name="submit" id="submit" src="images/2.jpg" style="padding-top: 23px;padding-left: 5px;"/>-->
            <!--  </form></li>-->
        </ul>
  </div>
<!--头部结束-->