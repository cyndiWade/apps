<?php 

/**
 * 	公司介绍
 */
class ApiCompanyAction extends ApiPublicBaseAction {

	public function index() {
		$data = (array) $this->oApp;
		
		$this->callback(STATUS_SUCCESS, '获取成功！', $data);
	}

}

?>