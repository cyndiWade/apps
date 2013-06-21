<?php 

/**
 * 	动态类
 */
class ApiDynamicAction extends ApiBaseAction {
	protected $aVerify = array(
		'index', 'read',
	);
	
	/*
	 * 动态列表
	 */
	public function index() {
		$data = D('Dynamic')->where('uid' => $this->oUser->id, 'status' => 0)->select();
		
		return $this->callback(STATUS_SUCCESS, '获取成功', $data);
	}
	
	public function read() {
		$id = getRequest('id');
		$aDyn = D('Dynamic')->where(array('id' => $id, 'uid' => $this->oUser->id, 'status' => 0))->find();
		
		if (!empty($aDyn)) {
			D('Dynamic')->setReaded($id);
			
			return $this->callback(STATUS_SUCCESS, '获取成功', $aDyn);
		} else {
			return $this->callback(STATUS_ERROR, '记录不存在！');
		}
	}
}

?>