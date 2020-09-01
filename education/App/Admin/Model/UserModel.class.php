<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model {
	protected $auth_key = 'mr_soft';//设置明文

	/***
	 * 登陆
	 * @param $username
	 * @param $password
	 * @return int|string
	 */
	public function login( $username, $password)
	{
		$username = strtolower( $username );
		if ( $username && $password )
		{
			$info = $this->where('username="'.$username.'"')->find();
			if ( !$info ) return '用户名或密码错误！';
			if ( strtolower( $info['password'] ) != md5( $password ) ) return '用户名或密码错误！';
			/** 使用id和密码，设置auth_code **/
			$auth_code = authcode( $info['id']."\t".md5( $password ), "ENCODE" , $this->auth_key );
			cookie( "AUTH_USER_STRING", $auth_code);
			cookie( "AUTH_USER_NAME", $username );
//			cookie( "AUTH_USER_LANG", M('admin_language')->where('id=1')->getField('lang') );
			cookie( "AUTH_USER_LANG", 'cn' );
		}
		return 1;
	}

	/***
	 * 退出登陆
	 */
	public function logout( )
	{
		cookie( "AUTH_USER_STRING", null );
		cookie( "AUTH_USER_NAME", null );
		cookie( "AUTH_USER_LANG", null );
	}

	/***
	 * 获取auth信息
	* @param null $field
	* @return mixed
	*/
	public function getAuthInfo( $field = NULL )
	{
		$authInfo = authcode( cookie( "AUTH_USER_STRING"), "DECODE", $this->auth_key );
		$authInfo = explode( "\t", $authInfo );
		$result['user_id']   = $authInfo[0];
		$result['user_pass'] = $authInfo[1];
		if ( $field )
		{
			if ( !empty($result[$field]) ){
				return $result[$field];
			}else{
				$info = $this->find($result['user_id']);
				return $info[$field];
			}
		}
		return $result;
	}

	public function auth( )
	{
			$authSuc = FALSE;
			if ( cookie( "AUTH_USER_STRING") ){
					$authInfo = $this->getAuthInfo( );
					$map['id'] = $authInfo['user_id'];
					$map['password'] = $authInfo['user_pass'];
					$userInfo = $this->where($map)->find();
					if ( $userInfo['id'] )$authSuc = TRUE;
			}

			if(!$authSuc){
				cookie( "AUTH_USER_STRING", null );
				cookie( "AUTH_USER_NAME", null );
				cookie( "AUTH_USER_LANG", null );
			}



			return $authSuc;
	}



	public function modifyPwd( $pwd )
	{
			$authInfo = $this->getAuthInfo( );
			$userId = $authInfo['user_id'];

			if ( $userId && $pwd )
			{
				$data['id'] = $userId;
				$data['password'] = md5($pwd);
				$this->save($data); // 根据条件更新记录
				return true;
			}else{
				return false;
			}
	}
		
		
		
		
			
		
		

}
