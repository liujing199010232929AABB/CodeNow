<?php
//namespace Think;
namespace Admin\Controller;
use Think\Controller;
use Myself\File;
use Myself\FileSystem;
class SiteController extends BaseController {

	/**
	 * 获取站点的配置文件信息
	 */
    public function index(){
		header('Content-Type:text/html;charset=utf-8');
		$configArr = require(__PHYSICS__.'/Common/Conf/site.cn.php');
		$this->assign('configArr',$configArr);// 赋值
		$this->display();
    }

	/**
	 * 站点配置信息写入配置文件
	 */
	public function save(){
		header('Content-Type:text/html;charset=utf-8');
		$configArr = I('post.');
		$language=$configArr['language']['val'];
		File::createFile(rtrim(__PHYSICS__,'\\').'/Common/Conf/site.cn.php' ,"<?php return ".var_export( $configArr, TRUE ).";");
		$this->success($GLOBALS['notice']['success'][4]);
		exit;
	}
	
	public function code(){
		
		$configArr = require(rtrim(__PHYSICS__,'\\').'/Common/Conf/site.'.cookie('AUTH_USER_LANG').'.php');
		if(empty($configArr['SiteUrl']['val'])){
			$this->error('请先填写网站地址！',U('Site/index'));
		}
		$configArr['SiteUrl']['val']=(strpos($configArr['SiteUrl']['val'], 'http://') === false && strpos($configArr['SiteUrl']['val'], 'https://') === false) ? 'http://'.$configArr['SiteUrl']['val']: $configArr['SiteUrl']['val'];
		$this->assign('configArr',$configArr);// 赋值
		$this->display();
	}


	/***
	 * phpqrcode 扩展类生成二维码
	 */
	public function creatCode(){
		vendor("phpqrcode.phpqrcode");
		$data = I('domain');
		// 纠错级别：L、M、Q、H
		$level = 'H';
		// 点的大小：1到10,用于手机端4就可以了
		$size = 4;
		// 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false
		//$path = "images/";
		// 生成的文件名
		//$fileName = $path.$size.'.png';
		\QRcode::png($data, false, $level, $size);
	}


	/**
	 * 一个月内的访问统计
	 */
	public function countSite(){
		$mpr = M('guest_pr');
		$mpv = M('guest_pv');
		$todayTimeStr = strtotime(date('Y-m-d'));
		for($i=29 ; $i>-1; $i--){
			$dateStrArray[] = '\''.date('n.d',($todayTimeStr-86400*$i)).'\'';
		}
		for($i=29 ; $i>-1; $i--){
			$dateArray[] = $todayTimeStr-86400*$i;
		}
		for($i=0 ; $i<30; $i++){
			$prArray[] = $mpr->where('addtime='.$dateArray[$i])->getField('count(*)');
			$pvArray[] = $mpv->where('addtime='.$dateArray[$i])->getField('count(*)');
		}
		$this->assign('dateStrArray',implode(',',$dateStrArray));
		$this->assign('prArray',implode(',',$prArray));
		$this->assign('pvArray',implode(',',$pvArray));			
		
		$this->display();		
	}

	
}