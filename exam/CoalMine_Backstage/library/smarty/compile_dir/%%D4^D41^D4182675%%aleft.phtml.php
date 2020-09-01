<?php /* Smarty version 2.6.19, created on 2016-11-24 10:02:24
         compiled from aleft.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'aleft.phtml', 22, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>煤矿系统后台-管理中心</title>
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/css/reset.css" rel="stylesheet" type="text/css" />
<script src="Scripts/aleft.js" type="text/javascript"></script>
</head>
<body>
<div id="box"> 
  <!--内容开始 --> 
  <!--左侧-->
  <div id="con_left">
    <div class="left_con">
      <div class="left_fl_con">
        <div id="PARENT">
          <ul id="left_fl_con1">
            <?php if ($_SESSION['permissions'] == 3 || $_SESSION['permissions'] == 2): ?>
            <li><a href="#" onClick="DoMenu('ChildMenu1')">类别管理</a>
              <ul id="ChildMenu1" class="collapsed">
                <li><a href="abigtype.php?big_type=<?php echo ((is_array($_tmp='类别管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='添加工种类别')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">添加工种类别</a></li>
                <li><a href="alistbigtype.php?big_type=<?php echo ((is_array($_tmp='类别管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='更改工种类别')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">更改工种类别</a></li>
                  <li><a href="addknowledgetype.php?big_type=<?php echo ((is_array($_tmp='类别管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='添加培训类别')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">添加培训类别</a></li>
                  <li><a href="editknowledgetype.php?big_type=<?php echo ((is_array($_tmp='类别管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='更改培训类别')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">更改培训类别</a></li>
             </ul>
            </li>
            <?php endif; ?>
            <li><a href="#" onClick="DoMenu('ChildMenu2')">员工名册管理</a>
              <ul id="ChildMenu2" class="collapsed">
                <?php if ($_SESSION['permissions'] == 3 || $_SESSION['permissions'] == 2): ?>
                <li><a href="aaddbccdserver.php?big_type=<?php echo ((is_array($_tmp='员工花名册管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='添加员工信息')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">添加员工信息</a></li>
                 <!-- <li><a href="importworkers.php?big_type=<?php echo ((is_array($_tmp='员工花名册管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='员工信息导入')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">员工信息导入</a></li>-->
<!--                  <li><a href="<?php echo $this->_reg_objects['util'][0]->baseUrl();?>
/uploadimg/up.php?big_type=<?php echo ((is_array($_tmp='员工花名册管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='员工照片导入')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">员工照片导入</a></li>-->
                <?php endif; ?>
                <li><a href="aeditbccdserver.php?big_type=<?php echo ((is_array($_tmp='员工花名册管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='浏览员工信息')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">浏览员工信息</a></li>
                <li><a href="afindbccdserver.php?big_type=<?php echo ((is_array($_tmp='员工花名册管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='查询员工信息')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">查询员工信息</a></li>
              </ul>
            </li>
            <?php if ($_SESSION['permissions'] == 3 || $_SESSION['permissions'] == 2): ?>
            <li><a href="#" onClick="DoMenu('ChildMenu3')">交流平台</a>
              <ul id="ChildMenu3" class="collapsed">
                <li><a href="aaddbccdinfo.php?big_type=<?php echo ((is_array($_tmp='煤矿数据管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='添加培训内容')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">添加培训内容</a></li>
                <li><a href="aeditbccdinfo.php?big_type=<?php echo ((is_array($_tmp='煤矿数据管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='更改培训内容')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">更改培训内容</a></li>
<!--                <li><a href="afindbccdinfo.php?big_type=<?php echo ((is_array($_tmp='煤矿数据管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='查询培训内容')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">查询培训内容</a></li>-->

                <li><a href="aaddbccdupdate.php?big_type=<?php echo ((is_array($_tmp='煤矿数据管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='添加新闻')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">添加新闻</a></li>
                <li><a href="aeditbccdupdate.php?big_type=<?php echo ((is_array($_tmp='煤矿数据管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='更改新闻')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">更改新闻</a></li>
                <li><a href="aaddbccdbuding.php?big_type=<?php echo ((is_array($_tmp='煤矿数据管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='添加公告')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">添加公告</a></li>
                <li><a href="aeditbccdbuding.php?big_type=<?php echo ((is_array($_tmp='煤矿数据管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='更改公告')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">更改公告</a></li>
              </ul>
            </li>
            <?php endif; ?>
              <?php if ($_SESSION['permissions'] == 3 || $_SESSION['permissions'] == 2): ?>
            <li><a href="#" onClick="DoMenu('ChildMenu4')">试题管理</a>
              <ul id="ChildMenu4" class="collapsed">
                <li><a href="aaddbccdswf.php?big_type=<?php echo ((is_array($_tmp='试题管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='添加试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">添加试题</a></li>
                <li><a href="alookbccdswf.php?page=1&pro_type=radio&big_type=<?php echo ((is_array($_tmp='试题管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='浏览试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">浏览试题</a></li>
                <li><a href="afindbccdswf.php?big_type=<?php echo ((is_array($_tmp='试题管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='查询试题')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">查询试题</a></li>
<!--                  <li><a href="degree.php?big_type=<?php echo ((is_array($_tmp='试题管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='难度设置')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">难度设置</a></li>-->
<!--                  <li><a href="importquestions.php?big_type=<?php echo ((is_array($_tmp='试题管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='试题导入')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">试题导入</a></li>-->
                  <li><a href="exportquestions.php?page=1&pro_type=radio&big_type=<?php echo ((is_array($_tmp='试题管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='试题导出')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">试题导出</a></li>
<!--                  <li><a href="addexamtypes.php?big_type=<?php echo ((is_array($_tmp='试题管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='增加题型')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">增加题型</a></li>-->
<!--                  <li><a href="manageexamtypes.php?big_type=<?php echo ((is_array($_tmp='试题管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='管理题型')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">管理题型</a></li>-->
                  <li><a href="statistics.php?big_type=<?php echo ((is_array($_tmp='试题管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='题型统计')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">题型统计</a></li>
              </ul>
            </li>
              <?php endif; ?>
              <?php if ($_SESSION['permissions'] == 3 || $_SESSION['permissions'] == 2): ?>
              <li><a href="#" onClick="DoMenu('ChildMenu5')">试卷管理</a>
              <ul id="ChildMenu5" class="collapsed">
                <li><a href="aaddbccdnames.php?big_type=<?php echo ((is_array($_tmp='试卷管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='生成模拟考核试卷')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">生成模拟考核试卷</a></li>
                <li><a href="aeditbccdnames.php?big_type=<?php echo ((is_array($_tmp='试卷管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='管理模拟考核试卷')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">管理模拟考核试卷</a></li>
                <?php if ($_SESSION['permissions'] == 3): ?>
                <li><a href="aaddbccdname.php?big_type=<?php echo ((is_array($_tmp='试卷管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='生成上岗考核试卷')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">生成上岗考核试卷</a></li>
                <li><a href="aeditbccdname.php?big_type=<?php echo ((is_array($_tmp='试卷管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='管理上岗考核试卷')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">管理上岗考核试卷</a></li>
                <li><a href="addemattr.php?big_type=<?php echo ((is_array($_tmp='试卷管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='分数和分数线')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">分数和分数线</a></li>
                  <li><a href="templatedefine.php?big_type=<?php echo ((is_array($_tmp='试卷管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='模板定义')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">模板定义</a></li>
                  <li><a href="managetemplate.php?big_type=<?php echo ((is_array($_tmp='试卷管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='模板管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">模板管理</a></li>
<!--                  <li><a href="manualfraction.php?big_type=<?php echo ((is_array($_tmp='试卷管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='人工阅卷')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">人工阅卷</a></li>-->
                <?php endif; ?>
              </ul>
            </li>
              <?php endif; ?>
            
            <?php if ($_SESSION['permissions'] == 2): ?>
            <li><a href="#" onClick="DoMenu('ChildMenu8')">数据库管理</a>
              <ul id="ChildMenu8" class="collapsed">
                <li><a href="bak.php?big_type=<?php echo ((is_array($_tmp='数据库管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='数据库备份')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">数据库备份</a></li>
                <li><a href="bak.php?big_type=<?php echo ((is_array($_tmp='数据库管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
  & small_type=<?php echo ((is_array($_tmp='数据库恢复')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">数据库恢复</a></li>
                <li><a href="bak.php?big_type=<?php echo ((is_array($_tmp='数据库管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
  & small_type=<?php echo ((is_array($_tmp='删除旧备份')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">删除旧备份</a></li>
              </ul>
            </li>
            <?php endif; ?>
            <?php if ($_SESSION['permissions'] == 3): ?>
            <li><a href="#" onClick="DoMenu('ChildMenu10')">成绩管理</a>
                <ul id="ChildMenu10" class="collapsed">
<!--                    <li><a href="searchmockfraction.php?big_type=<?php echo ((is_array($_tmp='成绩管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='模拟考试成绩查询')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">模拟考试成绩查询</a></li>-->
                    <li><a href="searchfraction.php?big_type=<?php echo ((is_array($_tmp='成绩管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='上岗考试成绩查询')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">上岗考试成绩查询</a></li>
                    <li><a href="fractionstatistics.php?big_type=<?php echo ((is_array($_tmp='成绩管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='上岗考试成绩统计')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">上岗考试成绩统计</a></li>
                </ul>
            </li>
            <li><a href="#" onClick="DoMenu('ChildMenu9')">权限管理</a>
              <ul id="ChildMenu9" class="collapsed">
                <li><a href="aaddadmin.php?big_type=<?php echo ((is_array($_tmp='权限管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='添加管理员')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">添加管理员</a></li>
                <li><a href="aeditadmin.php?big_type=<?php echo ((is_array($_tmp='权限管理')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
 & small_type=<?php echo ((is_array($_tmp='更改管理员权限')) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
" target="mainwindow">更改管理员权限</a></li>
              </ul>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
      <div class="left_d">技术支持：吉林省明日科技有限公司</div>
    </div>
  </div>
</div>
</body>
</html>