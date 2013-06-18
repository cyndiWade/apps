<?php 

/**
 * IOS端API
 */
class ApiAction extends ApiBaseAction {

	
	public function index() {
		echo parent::_init();
	}
	
	
	//首页活动
	public function active() {

		$app_id =  $this->AppInfo->id;		//公司ID
		$Active = M('Active');
		$list = $Active->field('id,title,pics')->where(array('app_id'=>$app_id,'sort'=>1,'status'=>0))->limit('0,3')->select();
		//重新组合图片格式
		foreach ($list AS $key=>$val) {
			$list[$key]['pics'] = parent::visitUrl($list[$key]['pics'],'img');
		}
		
		$list ? $status = "success" : $status = "error";
		$return = array(
			"status"=>$status,
			"info"=>$list
		);
		echo json_encode($return);
	}
	
	
	/**
	 * 添加主题(语音、图片、文字)
	 */
	public  function addTopic() {
		
		if ($this->isPOST()) {
			
			$Topic = D('Topic');							//主题表
			$File = D('File');								//文件表
			$Topic->create();								//手机Post提交数据
			$Topic->time = time();						//上传时间
			
			//文件数据
			$picFile = $_FILES['pic_file'];			//上传图片信息
			$voiceFile = $_FILES['voice_file'];		//上传音频信息

			//------上传文件处理
			//1、上传图片文件
			if (!empty($picFile['name'])) {
				$PicInfo = parent::ApiUpload($picFile,'pic');				
				$File->type = 1;																//图片类型
				$File->size = $PicInfo['info'][0]['size'];								//文件大小
				$File->url = $PicInfo['info'][0]['savename'];							//文件路径
				$pid = $File->add();															//保存到数据库 
				if ($pid) $Topic->pic = $pid;												
			}
			//2、上传音频文件
			if (!empty($voiceFile['name'])) {
				$voiceInfo = parent::ApiUpload($voiceFile,'voice');	
				$File->type = 2;																//音频类型
				$File->size = $voiceInfo['info'][0]['size'];								//文件大小
				$File->url = $voiceInfo['info'][0]['savename'];						//文件路径
				$vid = $File->add();															//保存到数据库 
				if ($vid) $Topic->voice = $vid;
			}
			//保存到数据库
			$Topic->add() ? $status = "success" : $status = "error";
			
			//返回数据
			$return =  array("status"=>$status);
			echo json_encode($return);
		}
		
		$this->display('demo');
		
// 		$app_id =  $this->AppInfo->id;		//公司ID
// 		$user_id = $this->_post('user_id');	//用户id
// 		$type = $this->_post('type');			//主题类型
// 		$pid = $this->_post('pid');				//所属项目
		
	//	echo $Topic->add();
		
	}
	
	
	
	//评论数据接口
	public function comment() {
			
		parent::ApiUpload();
	}
	
	
	
	

	//错误提示
	private function _error() {
		$arr = array("status"=>"error",'info'=>"Illegal operation");
		exit(json_encode($arr));
	}

}

?>