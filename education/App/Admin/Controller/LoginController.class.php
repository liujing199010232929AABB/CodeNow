<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function index(){
		$this->display();
    }

	/**
	 * 获取验证码
	 */
	public function sendAdminValid(){
	    $config = require( __PHYSICS__."/Common/Conf/valid_admin.php");
		if(!$config['codeSet'])unset($config['codeSet']);
		if(!$config['zhSet'])unset($config['zhSet']);
	
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}

	/**
	 * 检测验证码
	 */
	public function ajaxCheckValid(){
		$config = require( __PHYSICS__."/Common/Conf/valid_admin.php");
		$verify = new \Think\Verify($config);
		$valid = I('valid');
		$res = $verify->check($valid);
		echo $res?1:0;exit;
	}

	/**
	 * 检测用户是否存在
	 */
	public function ajaxCheckUser(){
		$username = I('username');
		$user = M('user');
		$user_id = $user->where('username="'.$username.'"')->getField('id');
		echo $user_id?1:0;exit;
	}

	/**
	 * 检测密码是否正确
	 */
	public function ajaxCheckPwd(){
		$username = I('username');
		$password = I('password');
		$user = M('user');
		$user_id = $user->where('username="'.$username.'" AND password="'.md5($password).'"')->getField('id');
		echo $user_id?1:0;exit;
	}

	/**
	 * 用户登录
	 */
	public function userLogin(){
		$username = I('admin_username');
		$password = I('admin_password');
		$user = D('Admin/User');
		/**检测用户名密码是否为空**/
		if(empty($username) || empty($password)){
		   $errorMsg = '请填写账号和密码！';
		   $this->error($errorMsg);
		}
		/**检测用户名密码是否正确**/
		if ($username && $password) {
				$result = $user->login($username, $password);
				if($result==1) {
				  redirect(U('Index/index'));
				}else{
				  $errorMsg = $result;
				  $this->error($errorMsg);
				}
				   
		} else {
			$errorMsg = '请填写账号和密码！';
			$this->error($errorMsg);
		}
	}

	/**
	 * 用户退出登陆
	 */
	public function userlogout(){
		$user = D('Admin/User');
		$user->logout();
		redirect(U('Login/index'));
	}

}