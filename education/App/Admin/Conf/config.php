<?php
$upload="Upload";//上传文件夹
return array(
	'SHOW_PAGE_TRACE' =>false,//调试 
	'LOAD_EXT_CONFIG' => array('NAV'=>'nav','NUMBER'=>'number','NOTICE'=>'notice','ATM'=>'atm_type','HTML'=>'html','HTML_MOBILE'=>'html_mobile'),

	'TMPL_TEMPLATE_SUFFIX'=>'.tpl',
	//'配置项'=>'配置值'
	'URL_ROUTER_ON' => true, //开启路由
	'URL_MODEL' => '0',   ////路由方式	
	'URL_HTML_SUFFIX'=>'do',
    'URL_ROUTE_RULES' => array( //定义路由规则
		
    ),	

    //默认错误跳转对应的模板文件
    'TMPL_ACTION_ERROR' => 'Inc:dispatch_jump',
    //默认成功跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => 'Inc:dispatch_jump',

    'TMPL_PARSE_STRING' =>array(
    '__IMG__' => __ROOT__.'/App/'.MODULE_NAME.'/Public/images', // 切图路径
    '__CSS__' => __ROOT__.'/App/'.MODULE_NAME.'/Public/css', // 样式表路径
    '__JS__' => __ROOT__.'/App/'.MODULE_NAME.'/Public/js', // 切图js路径
    '__DATA__' => __ROOT__.'/Data', // 数据库备份
	'__AFILE__' => $upload."/", // 上传路径
	'__UPLOAD__' => __ROOT__.'/'.$upload, // 上传路径
    ),

	/**数据库备份相关配置参数**/
	  'DATA_BACKUP_PATH' => './Data/', ///路径必须以 / 结尾
	  'DATA_BACKUP_PART_SIZE' => '20971520',  ////该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M
	  'DATA_BACKUP_COMPRESS' => '1',//压缩备份文件需要PHP环境支持gzopen,gzwrite函数0:不压缩1:启用压缩
	  'DATA_BACKUP_COMPRESS_LEVEL' => '9',//数据库备份文件的压缩级别，该配置在开启压缩时生效1:普通4:一般9:最高

);
?>