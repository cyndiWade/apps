<?php 

/**
 * 	对外接口-----主页活动模块
 */
class ApiActiveAction extends ApiPublicBaseAction {

	//首页活动
	public function index() {
		$Active = D('Active');
		$app_id =  $this->oApp->id;		//公司ID
		$list = $Active->getIndexList($app_id);
		
		$list ? $this->callback(STATUS_SUCCESS, "获取成功！",$list) : $this->callback(STATUS_SUCCESS, "没有数据！");
	}
	
	
	//所有活动列表
	public function activeList() {
		$Active = D('Active');
		$app_id =  $this->oApp->id;				//公司ID
		$list = $Active->getAllList($app_id);
		
		$list ? $this->callback(STATUS_SUCCESS, "获取成功！",$list) : $this->callback(STATUS_SUCCESS, "没有数据！");
	}
	
	
	//获取详细活动信息
	public function detailed () {
		$Active = D('Active');
		$id = $this->_post('id');
		//$id = 1;
		$detailed = $Active->getDetailed($id);
		
		$detailed ? $this->callback(STATUS_SUCCESS, "获取成功！",$detailed[0]) : $this->callback(STATUS_SUCCESS, "没有数据！");	
	}
	
}

?>