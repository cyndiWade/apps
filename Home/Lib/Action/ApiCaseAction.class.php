<?php 

/**
 * 	案例列表
 */
class ApiCaseAction extends ApiPublicBaseAction {

	public function index() {
		$data = D('Case')->getPageList($this->oApp->id, getRequest('page'));
		
		$this->callback(STATUS_SUCCESS, '获取成功！', $data);
	}

	public function detail() {
		
	}
}

?>