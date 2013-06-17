<?php 

/**
 * 对外接口核心类
 */
class ApiBaseAction extends Action {
	
	protected $AppInfo;	//公司信息
	
	public function __construct() {
		$this->_init();		//接收用户信息
		$this->checkApp();
	}
	
	private  function _init() {
		$this->AppInfo->id = $_POST['app_id'];
		//$this->AppInfo->id = 1;
	}
	
	private function checkApp() {
		if (!$this->AppInfo->id) exit(json_encode(array("status"=>"error","info"=>"没有指定公司")));
	}

	
	
	//上传文件类
	protected function _upload($file,$type) {
		$file = base64_decode($file);					//解码成二进制
		file_put_contents('text.'.$type,$file);					//写入到文件
	}
	
	/**
	 * 图片上传方法
	 */
	protected function upload_img() {
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		//上传检测
		$upload->maxSize  = 3145728 ;									// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');		// 上传文件的(后缀)（留空为不限制），
		// 上传文件的(类型),m（留空为不限制），
		$upload->allowTypes = array ('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');
		//上传保存
		$upload->savePath =  C('TMPL_PARSE_STRING.__IMAGES__');			// 设置附件上传目录
		$upload->autoSub = true;											// 是否使用子目录保存上传文件
		$upload->subType = 'date';											// 子目录创建方式，默认为hash，可以设置为hash或者date日期格式的文件夹名
		$upload->saveRule =  'uniqid';										// 上传文件的保存规则，必须是一个无需任何参数的函数名
			
		//执行上传操作
		if(!$upload->upload()) {// 上传错误提示错误信息
			$status = 'error';
			$info = $upload->getErrorMsg();
		}else{// 上传成功 获取上传文件信息
			$status = 'success';
			$info =  $upload->getUploadFileInfo();
		}
		return array('status'=>$status,'info'=>$info);
	}
	

	//IOS统一上传文件方法
	protected function ApiUpload($type) {
		if ($type == 'pic')  {
			$allowExts  = array('jpg', 'gif', 'png', 'jpeg');					
			$dir = C('TMPL_PARSE_STRING.__IMAGES__');			
		} elseif ($type == 'video') {
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
			
		//执行上传操作
		if(!$upload->upload()) {						// 上传错误提示错误信息
			$status = 'error';
			$info = $upload->getErrorMsg();
		}else{// 上传成功 获取上传文件信息
			$status = 'success';
			$info =  $upload->getUploadFileInfo();
		}
		return array("status"=>"$status","info"=>"$info");
	}
	
	
	//访问地址
	protected function visitUrl($file_url,$type) {
		if ($type == 'img') return C('PUBLIC_FILE').C('TMPL_PARSE_STRING.__IMAGES__').$file_url;
		if ($type == 'video') return C('PUBLIC_FILE').C('TMPL_PARSE_STRING.__VIDEO__').$file_url;
		
	}
	
}

?>