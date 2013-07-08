<?php

class PublicAction extends Action {
	
	// 检查用户是否登录

	protected function checkUser() {

		if(!isset($_SESSION[C('USER_AUTH_KEY')])) {
			$this->assign('jumpUrl','Public/login');
			$this->error('没有登录');
		}
	}

	// 用户登录页面
	public function login() {	
		$company = $_GET['company'];
		$this->assign('company',$company);
		$this->display();
// 		if(!isset($_SESSION[C('USER_AUTH_KEY')])) {
// 			$this->display();
// 		}else{
// 			//$this->redirect('Content/tables');
// 		}
	}

	// 用户登出
    public function logout() {
    	$APP_ID = $_GET['_URL_'][2];
	    if (session_start()) {
			session_destroy();
			$this->success('退出成功','?s=/Public/login/company/'.$APP_ID);
		}
    }

	// 登录检测
	public function checkLogin() {

		$App = D('App');
		$User = D('User');
		$company = $_GET['company'];		//公司id
		$account = $_POST['account'];			//登陆账号
		$password = $_POST['password'];	//登陆密码
	
		$oUser = $User->getUser($account,$company);	//获取用户信息
		
		if(empty($account)) {
			$this->error('帐号错误！');
		}elseif (empty($password)){
			$this->error('密码必须！');
		}
		
        if(empty($oUser)) {
        	$this->error('帐号不存在或已禁用！');
        }  
        if($oUser->password != md5($password)) {
        	$this->error('密码错误！');
        }
        
        $oApp = $App->getApp($company);
        if (empty($oApp)) {
        	$this->error('没有该公司！');
        }
        
        $_SESSION['app'] =  $oApp;
        $_SESSION['user'] = $oUser;
        
		$this->success('登录成功！',"?s=/App/index");

	}

	
	
	
}
?>