<?php 

/**
 * 	对外接口-----主页活动模块
 */
class ApiActiveAction extends ApiPublicBaseAction {

	//首页活动
	public function index() {
	
		$app_id =  $this->oApp->id;		//公司ID
		
		$Active = M('Active');
		$list = $Active->field('id,title,pics')->where(array('app_id'=>$app_id,'sort'=>1,'status'=>0))->limit('0,3')->select();
	
		if ($list) {
			//重新组合图片格式
			foreach ($list AS $key=>$val) {
				dump($val);
				$list[$key]['pics'] = visitUrl($list[$key]['pics']);
			}
			$this->callback(STATUS_SUCCESS, "获取成功！",$list);
		} else {
			$this->callback(STATUS_SUCCESS, "没有数据！");
		}
	
	}
	
}

?>