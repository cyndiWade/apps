<?php 

/**
 * 	公司介绍
 */
class ApiCompanyAction extends ApiBaseAction {

	public function index() {
		$data = (array) $this->oApp;
		
		$this->callback(STATUS_SUCCESS, '获取成功！', $data);
	}

}

?>