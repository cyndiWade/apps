<?php 

/**
 * 	公司介绍
 */
class ApiCompanyAction extends ApiBaseAction {

	public function index() {
		$data = (array) $this->oApp;
		$data['logo'] = visitUrl($data['logo'], 'company_logo.jpg');

		$this->callback(STATUS_SUCCESS, '获取成功！', $data);
	}

}

?>