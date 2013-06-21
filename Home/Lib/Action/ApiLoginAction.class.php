<?php 

/**
 * 	登录，注册功能模块类
 */
class ApiLoginAction extends ApiBaseAction {

	public function login() {
		$account = getRequest('account');
		$password = getRequest('password');
		$company = getRequest('company');
		
		$oUser = D('User')->getUser($account,$company);	//获取用户信息
		if(empty($oUser)) {
			$this->callback(STATUS_ERROR, '帐号不存在或已禁用！');
		}
		if($oUser->password != md5($password)) {
			$this->callback(STATUS_ERROR, '密码错误！');
		}
		
		//生成sessionKey
		$key = D('Session')->makeKey($oUser);
		
		//更新登录数据
		$data = array(
			'last_login_ip' => get_client_ip(),
			'last_login_time' => time(),
			'login_count' => $oUser->login_count + 1,
		);
		D('User')->data($data)->where(array('id' => $oUser->id))->save();
		
		//返回数据
		$data = array(
			'SN_KEY' => $key,
			'user' => (array) $oUser,
		);
		$this->callback(STATUS_SUCCESS, '登录成功！', $data);
	}

	public function regist() {
		$App = D('App');
		$User = D('User');
		
		$account = getRequest('account');
		$password = getRequest('password');
		$company = getRequest('company');		//公司id
		
		if(empty($account)) {
			$this->callback(STATUS_ERROR, '帐号不能为空！');
		}elseif (empty($password)){
			$this->callback(STATUS_ERROR, '密码不能为空！');
		}
		
		$oUser = $User->getUser($account,$company);	//获取用户信息
		
		if(!empty($oUser)) {
			$this->callback(STATUS_ERROR, '对不起，该帐号已被使用！');
		}
		
		$data = array(
			'account' => $account,
			'password' => md5($password),
			'app_id' => $company,
			'nickname' => $account,
			'last_login_ip' => get_client_ip(),
			'type' => 2,
		);
		
		$oUser = D('User')->addUser($data);
		if (!empty($oUser)) { //注册成功
			//生成sessionKey
			$key = D('Session')->makeKey($oUser);
			
			$data = array(
				'SN_KEY' => $key,
				'user' => (array) $oUser,
			);
			$this->callback(STATUS_SUCCESS, '注册成功！', $data);
		} else {
			$this->callback(STATUS_ERROR, '数据添加失败！');
		}

	}
	
	public function changePwd() {
		$account = getRequest('account');
		$password = getRequest('password');
		$newpassword = getRequest('newpassword');
		$company = getRequest('company');
		
		$oUser = D('User')->getUser($account,$company);	//获取用户信息
		if(empty($oUser)) {
			$this->callback(STATUS_ERROR, '帐号不存在或已禁用！');
		}
		if($oUser->password != md5($password)) {
			$this->callback(STATUS_ERROR, '密码错误！');
		}
		
		//更新登录数据
		$data = array(
			'password' => md5($newpassword),
		);
		D('User')->data($data)->where(array('id' => $oUser->id))->save();
		
		$this->callback(STATUS_SUCCESS, '修改成功！');
	}
}

?>