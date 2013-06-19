<?php 

/**
 * 对外接口核心类(需要登录后)
 */
class ApiAuthBaseAction extends ApiBaseAction {
	
	//过滤部分不需要，登录验证的模块
	protected $eliminate = array(
		'ApiTopic/index',
		
	);				
	
	public function __construct() {
		parent::__construct();

		//对免验证模块，不进行登录验证。
		if (!in_array(MODULE_NAME.'/'.ACTION_NAME,$this->eliminate)) {
			$this->checkLogin();//检查的登录
		}

	}
	
	private function checkLogin() {
		if (empty($this->oUser)) {
			$this->callback(STATUS_NOT_LOGIN, '未登录！');
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

}

?>