<?php 

/**
 * 对外接口核心类
 */
class ApiBaseAction extends Action {
	
	protected $oApp;//公司信息
	protected $oUser;//用户信息
	
	public const STATUS_SUCCESS = 0;//获取成功
	public const STATUS_ERROR = 1001;//其他错误
	public const STATUS_NOT_LOGIN = 1002;//未登录
	
	public function __construct() {
		parent::__construct();
		
		//检查session，获取用户信息
		$this->checkSession();
		
		//获取公司信息
		if (!empty($this->$oUser)) {
			$this->oApp = D('App')->getApp($oUser->app_id);
		}  else {
			$this->oApp = D('App')->getApp(getRequest('company'));	
		}
		
		if (empty($this->oApp)) {
			$this->callback(STATUS_ERROR, '公司不存在！');
		}
	}
	
	/*
	 * 回调函数
	 * 
	 */
	protected function callback($status = self::STATUS_SUCCESS, $msg = '获取成功！', $data = array()) {
		$ret = array(
			'status' => $status,
			'msg' => $msg,
			'data' => $data,
		);
		
		die(json_encode($ret));
	}
	
	/*
	 * 检查session是否有效，有效则获取用户信息
	 */
	protected function checkSession() {
		$key = getRequest('SN_KEY');
		if (empty($key)) {
			return false;
		}
		
		$uid = D('Session')->check($key);
		$oUser = D('User')->getUserByUid($uid);
		
		if (empty($oUser)) {
			return false;
		}	

		if ($oUser->last_login_ip != get_client_ip()) {
			return false;
		} else {
			//session有效，赋值oUser
			$this->oUser = $oUser;

			return true;
		}

	}
	

}

?>