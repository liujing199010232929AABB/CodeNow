<?php 
/**

 * thumbResizeType:缩略类型； 1:等比例缩放类型，2:缩放后填充类型，3:居中裁剪类型,4:左上角裁剪类型, 5 :右下角裁剪类型,6 :固定尺寸缩放类型
 * pathdir: 'upfile/'+pathdir+'filename' ;//后面要加斜线
 * pos 水印位置 参照九宫图位置 0-9 可以是数组
 * watermarkPic 水印内容   可以是图像文件名，也可以是文字
 * 先测试使用目录，如果目录文件太多需要重新调整图片目录存储位置
 * 
 */
 $fileSize=3145728;//上传大小
 $filePath='Upload/';//设置附件上传根目录
 $savePath='temp/';
  return array (
		'pic'=>array(
			'maxSize' => $fileSize, // 设置附件上传大小
			'rootPath' => $filePath, // 设置附件上传根目录
			'savePath' => $savePath, // 设置附件上传（子）临时目录
			'ToPath' => 'infomation/pic/', // 设置附件目标目录
			'saveName' => array('uploadName',''), // array('uniqid','')上传文件的保存规则，支持数组和字符串方式定义
			'exts' => array('jpg', 'gif', 'png', 'jpeg'), // 设置附件上传类型
			'autoSub' => false,// 自动使用子目录保存上传文件 默认为true
			'subName' => array('date','Ymd'), // 子目录创建方式，采用数组或者字符串方式定义
			'replace'       =>  false, //存在同名是否覆盖
			'thumb' => true,
			'thumbResizeType' => 1,
			'thumbWidth' => 250,
			'thumbHeight' => 250,
			'watermark' => false,
			'watermarkPos' => 9,
			'watermarkPic' => './Common/conf/water.png',
		),
		'file'=>array(
			'maxSize' => $fileSize, // 设置附件上传大小
			'rootPath' => $filePath, // 设置附件上传根目录
			'savePath' => $savePath, // 设置附件上传（子）临时目录
			'ToPath' => 'infomation/file/', // 设置附件目标目录
			'saveName' => array('uploadName',''), // array('uniqid','')上传文件的保存规则，支持数组和字符串方式定义
			'exts' => array('rar', 'zip', 'txt'), // 设置附件上传类型
			'autoSub' => false,// 自动使用子目录保存上传文件 默认为true
			'subName' => array('date','Ymd'), // 子目录创建方式，采用数组或者字符串方式定义
			'replace'       =>  false, //存在同名是否覆盖
		),
		'video'=>array(
			'maxSize' => $fileSize, // 设置附件上传大小
			'rootPath' => $filePath, // 设置附件上传根目录
			'savePath' => $savePath, // 设置附件上传（子）临时目录
			'ToPath' => 'infomation/video/', // 设置附件目标目录
			'saveName' => array('uploadName',''), // array('uniqid','')上传文件的保存规则，支持数组和字符串方式定义
			'exts' => array('flv','swf','mp4','avi','3gp','wmv'), // 设置附件上传类型
			'autoSub' => false,// 自动使用子目录保存上传文件 默认为true
			'subName' => array('date','Ymd'), // 子目录创建方式，采用数组或者字符串方式定义
			'replace'       =>  false, //存在同名是否覆盖
		),

		'listAll'=>array( //批量传资料
			'maxSize' => $fileSize, // 设置附件上传大小
			'rootPath' => $filePath, // 设置附件上传根目录
			'savePath' => 'listAll/', // 设置附件上传（子）临时目录
			'ToPath' => 'listAll/', // 设置附件目标目录
			'saveName' => array('uploadName',''), // array('uniqid','')上传文件的保存规则，支持数组和字符串方式定义
			'exts' => array('jpg', 'gif', 'png', 'jpeg', 'txt'), // 设置附件上传类型
			'autoSub' => false,// 自动使用子目录保存上传文件 默认为true
			'subName' => array('date','Ymd'), // 子目录创建方式，采用数组或者字符串方式定义
			'replace'       =>  true, //存在同名是否覆盖
			'TxtRename' => true, //txt格式重命名 true原始名称 false重命名
			'thumb' => true,
			'thumbResizeType' => 1,
			'thumbWidth' => 250,
			'thumbHeight' => 250,
			'watermark' => false,
			'watermarkPos' => 9,
			'watermarkPic' => './Common/Conf/water.png',
		),
		'common'=>array(
			'maxSize' => $fileSize, // 设置附件上传大小
			'rootPath' => $filePath, // 设置附件上传根目录
			'savePath' => $savePath, // 设置附件上传（子）临时目录
			'ToPath' => 'common/', // 设置附件目标目录
			'saveName' => array('uploadName',''), // array('uniqid','')上传文件的保存规则，支持数组和字符串方式定义
			'exts' => array('jpg', 'gif', 'png', 'jpeg'), // 设置附件上传类型
			'autoSub' => false,// 自动使用子目录保存上传文件 默认为true
			'subName' => array('date','Ymd'), // 子目录创建方式，采用数组或者字符串方式定义
			'replace'       =>  false, //存在同名是否覆盖
		),
		'commons'=>array(
			'maxSize' => $fileSize, // 设置附件上传大小
			'rootPath' => $filePath, // 设置附件上传根目录
			'savePath' => $savePath, // 设置附件上传（子）临时目录
			'ToPath' => 'common/', // 设置附件目标目录
			'saveName' => array('uploadName',''), // array('uniqid','')上传文件的保存规则，支持数组和字符串方式定义
			'exts' => array('jpg', 'gif', 'png', 'jpeg'), // 设置附件上传类型
			'autoSub' => false,// 自动使用子目录保存上传文件 默认为true
			'subName' => array('date','Ymd'), // 子目录创建方式，采用数组或者字符串方式定义
			'replace'       =>  false, //存在同名是否覆盖
		),
		'avatar'=>array(
			'maxSize' => $fileSize, // 设置附件上传大小
			'rootPath' => $filePath, // 设置附件上传根目录
			'savePath' => $savePath, // 设置附件上传（子）临时目录
			'ToPath' => 'member/avatar/', // 设置附件目标目录
			'saveName' => array('uploadName',''), // array('uniqid','')上传文件的保存规则，支持数组和字符串方式定义
			'exts' => array('jpg', 'gif', 'png', 'jpeg'), // 设置附件上传类型
			'autoSub' => false,// 自动使用子目录保存上传文件 默认为true
			'subName' => array('date','Ymd'), // 子目录创建方式，采用数组或者字符串方式定义
			'replace' =>  false, //存在同名是否覆盖
			'watermark' => false,
			'watermarkPos' => 9,
			'watermarkPic' => './Common/conf/water.png',
		),
		'atm'=>array(
			'maxSize' => $fileSize, // 设置附件上传大小
			'rootPath' => $filePath, // 设置附件上传根目录
			'savePath' => $savePath, // 设置附件上传（子）临时目录
			'ToPath' => 'atm/', // 设置附件目标目录
			'saveName' => array('uploadName',''), // array('uniqid','')上传文件的保存规则，支持数组和字符串方式定义
			'exts' => array('jpg', 'gif', 'png', 'jpeg'), // 设置附件上传类型
			'autoSub' => false,// 自动使用子目录保存上传文件 默认为true
			'subName' => array('date','Ymd'), // 子目录创建方式，采用数组或者字符串方式定义
			'replace'       =>  false, //存在同名是否覆盖
			'thumb' => true,
			'thumbResizeType' => 1,
			'thumbWidth' => 250,
			'thumbHeight' => 250,
			'watermark' => false,
			'watermarkPos' => 9,
			'watermarkPic' => './Common/conf/water.png',
		),
		'category'=>array(
			'maxSize' => $fileSize, // 设置附件上传大小
			'rootPath' => $filePath, // 设置附件上传根目录
			'savePath' => $savePath, // 设置附件上传（子）临时目录
			'ToPath' => 'category/', // 设置附件目标目录
			'saveName' => array('uploadName',''), // array('uniqid','')上传文件的保存规则，支持数组和字符串方式定义
			'exts' => array('jpg', 'gif', 'png', 'jpeg'), // 设置附件上传类型
			'autoSub' => false,// 自动使用子目录保存上传文件 默认为true
			'subName' => array('date','Ymd'), // 子目录创建方式，采用数组或者字符串方式定义
			'replace'       =>  false, //存在同名是否覆盖
			'thumb' => true,
			'thumbResizeType' => 1,
			'thumbWidth' => 250,
			'thumbHeight' => 250,
			'watermark' => false,
			'watermarkPos' => 9,
			'watermarkPic' => './Common/conf/water.png',
		),
	
);