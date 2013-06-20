<?php 

/**
 * 	专家列表（设计师，项目经理，材料商）
 */
class ApiExpertAction extends ApiPublicBaseAction {

	public function index() {
		$data = D('User')->getExpertList($this->oApp->id);
		
		$this->callback(STATUS_SUCCESS, '获取成功！', $data);
	}

}

?>