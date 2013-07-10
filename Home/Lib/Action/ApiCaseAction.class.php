<?php 

/**
 * 	案例列表
 */
class ApiCaseAction extends ApiBaseAction {

	public function index() {
		$data = D('CasePics')->getPageList($this->oApp->id, getRequest('page'), getRequest('style'), getRequest('type'));
		
		$this->callback(STATUS_SUCCESS, '获取成功！', $data);
	}

	public function detail() {
		$id = getRequest('id');
		$data = D('Case')->getOneCase($id);
		$data['images'] = D('CasePics')->getPic($id);
		
		$this->callback(STATUS_SUCCESS, '获取成功！', $data);
	}
}

?>