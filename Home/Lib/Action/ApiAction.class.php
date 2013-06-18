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
		$Topic = D('Topic');
		$Topic->create();	
		
		$Topic->time = time();
		
		if (isset($_FILES['pic'])) 	$pic = parent::ApiUpload('pic');
		if (isset($_FILES['video'])) 	$video = parent::ApiUpload('pic');
		
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