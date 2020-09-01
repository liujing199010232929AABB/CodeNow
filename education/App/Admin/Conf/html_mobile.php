<?php 
/*
*********title 按钮名称
*********model 模型标识
*********url   前台详细页面地址   ------不包括模块名
*********htmlpath ./App/Html/下的文件夹名称
*/
return array (

  'news' => 
  array (
	'title' => '信息系统',
	'model' => 'news',
	'url' => 'Index/view',
	'url_wap' => 'Index/view',
	'htmlpath' => 'News',
  ),

  
  
  'product' => 
  array (
	'title' => '产品系统',
  	'model' => 'shop_product',
  	'url' => 'Index/pro',
	'url_wap' => 'Index/pro',
  	'htmlpath' => 'Product',
  ),
  
  
  
);