<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
	
	protected $m = NULL;
	protected $md = NULL;
	protected $m_group = NULL;
	
	public function _initialize(){
		parent::_initialize();
		$this->m  = M('user');
		$this->md = D('Admin/User');
		$this->m_group = M('user_group');	
	}

	/**
	 * 账户管理
	 */
    public function index(){
		$group_id = $this->md->getAuthInfo('group_id'); //获取改账户的分组id
		$dataList = $this->md->where('group_id > '.$group_id)->order('group_id asc , id asc')->select(); //获取低于该账户下级账户
		$this->assign('dataList',$dataList);
		$powerList = $this->m_group->where('id > '.$group_id)->order('id asc')->select(); //获取改账户的下级分组
		$this->assign('powerList',$powerList);
		$this->display();
    }


	/**
	 * 编辑账户
	 */
	public function edit(){
		$group_id = $this->md->getAuthInfo('group_id');
		$powerList = $this->m_group->where('id >'.$group_id)->order('id asc')->select();//获取用户组信息
		$this->assign('powerList',$powerList);
		$this->display();
	}

	/**
	 * 保存账户
	 */
	public function save(){
		$temp = $this->m->create();
		$temp['password'] = md5($temp['password']);
		$result = $this->m->add($temp);
		if($result)$this->success($GLOBALS['notice']['success'][0],U('User/index'));
		else $this->error($GLOBALS['notice']['error'][0]);	
	}

	/**
	 * 删除账户
	 */
	public function del(){
		$id=I('id',0,'int');
		if($id===1)$this->error('超级管理员无法删除');
		if ($this->m->delete($id)){
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
		}else{
			$this->redirect('Base/selectPage', array('act'=>'error','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
		}	
    }		

	/**
	 *验证用户名
	 */
	public function ajaxCheckUsername(){
		$username = I('param','','string');
		$user_id  = $this->md->where('username="'.$username.'"')->getField('id');
		if(!$user_id){
			echo '{
				"info":"账户名称通过",
				"status":"y"
			 }';
			exit;
		}else{
			echo '{
				"info":"账户名称重复",
				"status":"n"
			 }';
			exit;
		}
	}	

	/**
	 * 显示修改密码
	 */
    public function password(){
		$this->display();
    }

	/**
	 * 保存密码
	 */
    public function editPassword(){
		$oldPass = I('oldpwd','','string');
		$newPass = I('newpwd','','string');
		$chkPass = I('chkpwd','','string');
		$user_id = $this->md->getAuthInfo('id');
		$password = $this->md->where('id="'.$user_id.'"')->getField('password');
		/** 验证阶段 **/
		if(empty($oldPass))$this->error('原始密码不能为空');
		if(empty($newPass))$this->error('新密码不能为空');

		if(md5($oldPass)!=$password)$this->error('原始密码不正确');
		if($newPass!=$chkPass)$this->error('新密码输入不一致，请重新输入');
		
		if($this->md->modifyPwd($newPass)){
			$this->assign('message','密码修改完毕，请重新登录');
			$this->display('success_jump');
		}else{
			$this->error('未知错误，请重新操作');
		}

    }

	/**
	 * 检验原始密码
	 */
	public function ajaxCheckUserPass(){
		$oldPass = I('param','','string');
		$user_id = $this->md->getAuthInfo('id');
		$password = $this->md->where('id="'.$user_id.'"')->getField('password');
		if(md5($oldPass)==$password){
			echo '{
				"info":"原始密码验证通过",
				"status":"y"
			 }';
			exit;
		}else{
			echo '{
				"info":"原始密码错误",
				"status":"n"
			 }';
			exit;
		}
	}

	/**
	 * 权限组管理
	 */
	public function power(){
		$group_id = $this->md->getAuthInfo('group_id');	//获取分组id
		$dataList = $this->m_group->where('id >'.$group_id)->order('id asc')->select();
		$this->assign('dataList',$dataList);
		$this->display();
	}

	/**
	 * 编辑分组
	 */
	public function powerEdit(){
		$group_id   = $this->md->getAuthInfo('group_id'); //获取分组id
		$group_keys = $this->m_group->where('id='.$group_id)->getField('group_keys'); //获取权限值
		$id = I('id',0,'int');
		$dataInfo = $this->m_group->find($id); //获取该分组下的权限值
		$this->assign('dataInfo',$dataInfo);
		$subNav = C('NAV');	//从nav文件中获取左侧导航数据
		$this->assign('subNav',$subNav);
		$this->display();
	}


	/**
	 * 保存编辑的信息
	 */
	public function powerSave(){
		$temp = $this->m_group->create(); //创建数据对象
		$temp['group_keys'] = implode(',',$temp['group_keys']);
		if($temp['id']){	//编辑
			$this->m_group->save($temp); 
			$this->success($GLOBALS['notice']['success'][2],U('User/power'));
		}else{			    //新增
		    $result = $this->m_group->add($temp);
			if($result)$this->success('增加完毕',U('User/power'));
			else $this->success('增加失败');
		}
	}


	/**
	 * 删除权限组
	 */
	public function powerDel(){
		$id = I('id',0,'int');
		if ($this->m_group->delete($id)){
			$this->success($GLOBALS['notice']['success'][1]);
		}else{
			$this->error($GLOBALS['notice']['error'][1]);
		}	
    }


	/**
	 * 选择权限组
	 */
	public function ajaxSelectUserPower(){
		$powerVal = I('val',0,'int');
		if(!$powerVal){
			echo "error";exit;
		}
		$mid = I('mid');
		$temp['id'] = $mid;
		$temp['group_id'] = $powerVal;
		$this->m->save($temp);
		echo "success";exit;
	}	

}