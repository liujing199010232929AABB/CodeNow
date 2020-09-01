<?php
$upload="Upload";//上传文件夹
return array(
	'SHOW_PAGE_TRACE' =>false,//调试 
	
	'HTML_CACHE_ON'     =>    C('CREAT_HTML'), // 开启静态缓存 /common/conf/config.php
	'HTML_CACHE_TIME'   =>    600,   // 全局静态缓存有效期（秒）
	'HTML_FILE_SUFFIX'  =>    '.html', // 设置静态缓存文件后缀
	'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则
//		 'news:view' => array('Cn/News/view-{id}'),
	),


	'TMPL_TEMPLATE_SUFFIX'=>'.php',
	//'配置项'=>'配置值'
	'URL_ROUTER_ON' => true, //开启路由
	'URL_MODEL' => '2',   ////路由方式	
	'URL_HTML_SUFFIX'=>'html',
    'URL_ROUTE_RULES' => array( //定义路由规则

    ),	
	
	
	'TMPL_PARSE_STRING' =>array(
    '__IMG__' => __ROOT__.'/Public/images', // 切图路径
    '__CSS__' => __ROOT__.'/Public/css', // 样式表路径
    '__JS__' => __ROOT__.'/Public/js', // 切图js路径
	'__AFILE__' => $upload."/", // 上传路径
	'__UPLOAD__' => __ROOT__.'/'.$upload, // 上传路径
    ),
	
	
    //默认错误跳转对应的模板文件
    'TMPL_ACTION_ERROR' => 'Inc:dispatch_jump',
    //默认成功跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => 'Inc:dispatch_jump',	
		
);