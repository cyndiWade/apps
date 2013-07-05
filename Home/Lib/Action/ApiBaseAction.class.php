<?php 

/**
 * 接口----基础类
 */
class ApiBaseAction extends Action {
	
	protected $oApp;//公司信息
	protected $oUser;//用户信息
	protected $aVerify = array();//需要验证的方法
	
	public function __construct() {
		
		parent::__construct();
		
		//检查session，获取用户信息
		$this->checkSession();
	
		//$this->oUser->id = 1;	//用户id
		
		//获取公司信息
		if (!empty($this->oUser)) {
			$this->oApp = D('App')->getApp($oUser->app_id);
		}  else {
			$this->oApp = D('App')->getApp(getRequest('company'));	
		}
		$this->oApp->id = 1;		//公司id
		
		
		if (empty($this->oApp)) {
			$this->callback(STATUS_ERROR, '公司不存在！');
		}
		
		//对免验证模块，不进行登录验证。
		if (in_array(ACTION_NAME,$this->aVerify)) {
			$this->checkLogin();//检查的登录
		}
	}
	
	/*
	 * 回调函数
	 * 
	 */
	protected function callback($status = STATUS_SUCCESS, $msg = '获取成功！', $data = array()) {
		$ret = array(
			'status' => $status,
			'msg' => $msg,
			'data' => $data,
			'num' => count($data),
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
	
	protected  function fixData($M, &$list, $field, $fields = '*', $pk='id') {
		$aIds = getArrayByField($list, $field);
		$aData = $M->getDataById(implode(',',$aIds),$pk , $fields);
		foreach ($list AS $key=> &$val) {
			$val[$field] = $aData[$val[$field]];
		}
	}
	
	/**
	 * IOS 上传文件
	 * @param Array     $file  $_FILES['pic']	  上传的数组
	 * @param String   $type   上传文件类型    pic为图片 	voice为音频
	 * @return Array	  上传成功返回文件保存信息，失败返回错误信息
	 */
	protected function ApiUpload($file,$type) {
		if ($type == 'pic')  {
			$allowExts  = array('jpg', 'gif', 'png', 'jpeg');
			$dir = C('TMPL_PARSE_STRING.__IMAGES__');
		} elseif ($type == 'voice') {
			$allowExts = array('aac','mp3');
			$dir = C('TMPL_PARSE_STRING.__VIDEO__');
		}
	
		import('ORG.Net.UploadFile');				//引入上传类
		$upload = new UploadFile();
		$upload->maxSize  = 3145728 ;			// 设置附件上传大小
		$upload->allowExts  = $allowExts;		// 上传文件的(后缀)（留空为不限制），，
		//上传保存
		$upload->savePath =  $dir;					// 设置附件上传目录
		$upload->autoSub = true;					// 是否使用子目录保存上传文件
		$upload->subType = 'date';					// 子目录创建方式，默认为hash，可以设置为hash或者date日期格式的文件夹名
		$upload->saveRule =  'uniqid';				// 上传文件的保存规则，必须是一个无需任何参数的函数名
			
		//执行上传
		$execute = $upload->uploadOne($file);
		//执行上传操作
		if(!$execute) {						// 上传错误提示错误信息
			$upload->getErrorMsg();
			return null;
		}else{// 上传成功 获取上传文件信息
			return $execute;
		}
	}
	
	private function checkLogin() {
		if (empty($this->oUser)) {
			$this->callback(STATUS_NOT_LOGIN, '未登录！');
		}
	}
}

?>