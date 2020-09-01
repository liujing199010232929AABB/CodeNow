<?php
namespace Admin\Model;
use Think\Model;
class MemberModel extends Model {

	    protected $auth_key = 'pangu_dd_on_board'; 

		public function login( $username, $password , $wap=0){
			$username = strtolower( $username );
			if ( $username && $password ){
				$info = $this->where('username="'.$username.'"')->find();
				if ( !$info )return 'noexist';
				if ( strtolower( $info['password'] ) != md5( $password ) )return 'nopass';
				if ( !$info['status'] )return 'islock';
				
				$auth_code = authcode( $info['id']."\t".$info['username']."\t".md5( $password ), "ENCODE" , $this->auth_key );
				cookie( "AUTH_MEMBER_STRING", $auth_code);
				cookie( "AUTH_MEMBER_NAME", $info['username'] );
				cookie( "AUTH_MEMBER_REALNAME", $info['nickname'] );
				$this->addLoginLog( $info['id'] );
			}
			return 'ok';
		}
		
		public function logout( ){
			cookie( "AUTH_MEMBER_STRING", null );
			cookie( "AUTH_MEMBER_NAME", null );
			cookie( "AUTH_MEMBER_REALNAME", null );
		}		
		
		public function getAuthInfo( $field = NULL ){
			$authInfo = authcode( cookie( "AUTH_MEMBER_STRING"), "DECODE", $this->auth_key );
			$authInfo = explode( "\t", $authInfo );
			$result['member_id'] = $authInfo[0];
			$result['member_pass'] = $authInfo[2];
			if ( $field ){
				if ( !empty($result[$field]) ){
					return $result[$field];
				}else{
					$info = $this->find($result['member_id']);
					return $info[$field];
				}
			}
			return $result;
		}

		public function auth( ){
			$authSuc = FALSE;
			if ( cookie( "AUTH_MEMBER_STRING") ){
				$authInfo = $this->getAuthInfo( );
				$map['id'] = $authInfo['member_id'];
				$map['password'] = $authInfo['member_pass'];
				$userInfo = $this->where($map)->find();
				if ( $userInfo['id'] )$authSuc = TRUE;
			}
			if(!$authSuc){
				cookie( "AUTH_MEMBER_STRING", null );
				cookie( "AUTH_MEMBER_NAME", null );
				cookie( "AUTH_MEMBER_REALNAME", null );
			}
			return $authSuc;
		}
		
		public function register( $postInfo ,$isAuto=true){
			$postInfo['username'] = strtolower( $postInfo['username'] );
			$member_id = $this->where('username="'.$postInfo['username'].'"')->getField('id');
			if ( $member_id ){
				return -1;
			}
			$postInfo['password']=md5( $postInfo['password'] );
			/*$insertInfo = array(
					"username" => $postInfo['username'],
					"password" => md5( $postInfo['password'] ),
					"nickname" => $postInfo['nickname'],
					"email" => $postInfo['email'],
					"mobile" => $postInfo['mobile'],
					"avatar" => $postInfo['avatar'],
					"addtime" => time( )
			);*/
			try
			{
					$user_id = $this->add( $postInfo );
					if($isAuto){//注册成功是否自动登录
						$auth_code = authcode( $user_id."\t".$postInfo['username']."\t". $postInfo['password'] , "ENCODE", $this->auth_key );
						cookie( "AUTH_MEMBER_STRING", $auth_code);
						cookie( "AUTH_MEMBER_NAME", $username );
						cookie( "AUTH_MEMBER_REALNAME", $info['nickname'] );
					}
					$this->addLoginLog( $user_id );
					
					return 1;
			}
			catch ( Exception $e )
			{
					return 0;
			}
		}		
		
		public function modify( $updateInfo ){
			$authInfo = $this->getAuthInfo( );
			$updateInfo["id"]=$authInfo['member_id'];
			/*$postInfo['username'] = strtolower( $authInfo['username'] );
			$member_id = $this->where('username="'.$postInfo['username'].'" and id<>'.$updateInfo["id"].' ')->getField('id');
			if ( $member_id ){
				return -1;
			}*/
			unset($updateInfo['username']);
			/*$updateInfo = array(
					"id" => $authInfo['member_id'],
					"nickname" => $postInfo['nickname'],
					"mobile" => $postInfo['mobile'],
					"email" => $postInfo['email'],
					"avatar" => $postInfo['avatar'],
			);*/
			try
			{
					if($updateInfo['password']){ $updateInfo['password']=md5( $updateInfo['password'] ); }
					$this->save( $updateInfo);
					cookie( "AUTH_MEMBER_REALNAME", $info['nickname'] );
					return 1;
			}
			catch ( Exception $e )
			{
					return 0;
			}
		}		
		
		public function editPassword( $pwd ){
			$authInfo = $this->getAuthInfo( );
			$memberId = $authInfo['member_id'];
			if ( $memberId && $pwd ){
				$data['id'] = $memberId;
				$data['password'] = md5($pwd);
				$this->save($data); // 根据条件更新记录				
				return true;
			}else{
				return false;
			}
		}
		
		public function addLoginLog( $memberId ){
			$data['id'] = $memberId;
			$data['final_login'] = time();	
			$data['login_ip'] = getIP();	
			$this->where('id='.$memberId)->setInc('logins'); // 用户的登录次数加1					
			$this->save($data); // 根据条件更新记录	
		}	
		
		public function checkMemberEmail( $username, $email ){
			return $this->where(array('username'=>$username,'email'=>$email))->getField('id');
		}
			
		public function updateFromGetPsw( $username, $email, $password ){
			$this->where(array('username'=>$username,'email'=>$email))->save(array('password'=>md5($password)));
			return true;
		}	
				
			
		
		

}
