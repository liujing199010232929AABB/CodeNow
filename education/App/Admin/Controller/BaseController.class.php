<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
   public function _initialize(){
   		$this->checkUser();	//检测用户是否登陆
		$m_config = M('admin_config');	//获取后台配置信息
		$this->assign('htmlPower',C('CREAT_HTML'));  //静态页开关
		$m_lang   = M('admin_language');
		$langList = $m_lang->order('list_order desc , id asc')->select();
		$this->assign('langList',$langList);// 赋值数据集

		$GLOBALS['notice'] = C('NOTICE');   //后台相关提示语
		
		$ma = D('user');
		$mb = M('user_group');
		$m_id = $ma->getAuthInfo('id');	
		$group_id   = $ma->getAuthInfo('group_id');
		$group_name = $mb->where('id='.$group_id)->getField('group_name');
		$group_keys = $mb->where('id='.$group_id)->getField('group_keys');
		$this->assign('m_id',$m_id);   //管理员ID
		$this->assign('group_name',$group_name);   //管理员权限组名
		$this->assign('group_keys',$group_keys);   //管理员权限索引
   }

	/**
	 * 检测用户是否登陆
	 */
   public function checkUser(){
   		$user = D('Admin/User');
		$result = $user->auth();
		!$result && $this->error('请登录后操作',U('Login/index'));
   }
   
   public function baseDelFile($m,$ids,$field){
		$file = new \Myself\FileSystem();// 实例化上传类
		$config=C("TMPL_PARSE_STRING");//获取相关配置信息
		$pInfo = M($m)->where('id in('.$ids.')')->field($field)->select();
		foreach($pInfo as $item){
			$delpic[]=$config["__AFILE__"].$item[$field];
			$info=pathinfo($item[$field]);
			$delpic[]=$config["__AFILE__"].$info['dirname']."/thumb_".$info["basename"];
		}
		$file->rm($delpic);//删除文件
		return $delpic;
   }

	public function selectPage(){
		$paras['act'] = I('act');
		$paras['title'] = I('title');
		$paras['back_url'] = I('back_url','','strip_tags');
		$paras['jump_url'] = I('jump_url','','strip_tags');

		$this->assign('paras',$paras);
		$this->display('Inc/select_jump');
	}





}