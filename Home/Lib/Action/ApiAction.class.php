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

		echo json_encode($list);
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