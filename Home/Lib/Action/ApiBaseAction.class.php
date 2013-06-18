<?php 

/**
 * 对外接口核心类
 */
class ApiBaseAction extends Action {
	
	protected $AppInfo;				//公司信息
	
	public function __construct() {
		$this->_init();					//接收用户信息
		$this->checkApp();
	}
	
	//初始化化方法
	private  function _init() {
		//$this->AppInfo->id = $_POST['app_id'];
		$this->AppInfo->id = 1;
	}
	//验证公司是否存在
	private function checkApp() {
		if (!$this->AppInfo->id) exit(json_encode(array("status"=>"error","info"=>"Not found Company")));
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
			$allowExts = array('mp3');
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
			$status = "error";
			$info = $upload->getErrorMsg();
		}else{// 上传成功 获取上传文件信息
			$status = "success";
			$info =  $execute;
		}
		return array("status"=>$status,"info"=>$info);

	}
	
	
	//文件访问地址
	protected function visitUrl($file_url,$type) {
		if ($type == 'img') return 'http://'.C('PUBLIC_FILE').C('TMPL_PARSE_STRING.__IMAGES__').$file_url;
		if ($type == 'video') return 'http://'.C('PUBLIC_FILE').C('TMPL_PARSE_STRING.__VIDEO__').$file_url;
		
	}
	
}

?>