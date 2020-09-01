<?php


// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
ini_set("magic_quotes_runtime",0);
// 定义运行时目录
define('RUNTIME_PATH','./Runtime/');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);
//define('BIND_MODULE','Cn');   ////默认绑定Cn模块
define('COMMON_PATH','./Common/');
//define('__PHYSICS__',dirname(__FILE__));    /////开发包物理路径
define('__PHYSICS__',dirname(__FILE__).DIRECTORY_SEPARATOR);
define('__DOCROOT__',$_SERVER['DOCUMENT_ROOT'].'/');    /////开发环境物理路径




// 定义应用目录
define('APP_PATH','./App/');

// 引入ThinkPHP入口文件
define('THINK_PATH',realpath('./ThinkPHP').'/');

require THINK_PATH.'ThinkPHP.php';
