<?php 
/**
 * 控制器核心类
 * @author Administrator
 *
 */
class BaseAction extends Action {
	protected $oUser;	//用户信息
	protected $oApp;		//公司信息
	
	public function __construct() {
		$this->_init();
	}
	
	/**
	 * 验证登陆
	 */
	protected function isLogin() {
		if (empty($_SESSION['user'])) {
			return false;
		} else {
			return true;
		}
	}
		
	/**
	 * 获取用户信息
	 */
	protected  function _init() {
		if ($this->isLogin()) {
			$this->oUser = $_SESSION['user'];
			
			if (empty($_SESSION['app'])) {
				$this->error('公司信息已过期，请重新登录！');
			}
			$this->oApp = $_SESSION['app'];
		}  else {
			$data = D('App')->getApp($_GET['company']);	//读取公司信息
			if (empty($data)) {
				$this->error('此公司不存在！');
			}
			$this->oApp = $data;
		}
	}
	
	
	/**
	 * 公共上传方法
	 */
	protected function upload() {
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
			
		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		return $info;
	}
	
	
}

?>