<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {


    public function index(){

		$this->display();
    }
	
	
    public function addTop(){

		$this->display('top');
    }	
	
    public function addLeft(){
		header('Content-Type:text/html;charset=utf-8');
		$subNav = C('NAV');
		$this->assign('subNav',$subNav);
		$this->display('left');
    }	
	



    public function addMain(){
		$subNav = C('NAV');
		$this->assign('subNav',$subNav);
		$map['language']   = cookie('AUTH_USER_LANG');
		$circle['news']    = M('news')->where($map)->count('*');
		$circle['product'] = M('shop_product')->where($map)->getField('count(*)');
		$circle['msg']     = M('msg')->where($map)->where('status=0')->getField('count(*)');
		$circle['common']  = M('common')->where($map)->getField('count(*)');
		$circle['member']  = M('member')->getField('count(*)');
		$circle['atm']     = M('atm')->where($map)->getField('count(*)');
		$circle['link']    = M('link')->where($map)->getField('count(*)');
		$circle['order']   = M('shop_product_order')->getField('count(*)');
		
		$this->assign('circle',$circle);
		
		$userKeys[] = 'newsManage';
		$userKeys[] = 'productManage';
		$userKeys[] = 'shopManage';
		$userKeys[] = 'msgManage';
		$userKeys[] = 'commonManage';
		$userKeys[] = 'memberManage';
		$userKeys[] = 'atmManage';
		$userKeys[] = 'linkManage';
		$userKeys[] = 'shopManage';
		
		$this->assign('userKeys',$userKeys);

		$configArr = require(__PHYSICS__.'/Common/Conf/site.cn.php');
		if(!empty($configArr['SiteUrl']['val'])){
			$configArr['SiteUrl']['val']=(strpos($configArr['SiteUrl']['val'], 'http://') === false && strpos($configArr['SiteUrl']['val'], 'https://') === false) ? 'http://'.$configArr['SiteUrl']['val']: $configArr['SiteUrl']['val'];
		}
		$this->assign('configArr',$configArr);// 赋值

		$this->display('main');
    }	

    public function addFoot(){
		$this->display('foot');
    }

	public function download(){
		$this->display();
    }






	
}