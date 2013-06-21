<?php 

/**
 * 	项目列表
 */
class ApiProjectAction extends ApiBaseAction {

	protected $aVerify = array(
		'add',
	);//需要验证的方法
	
	public function index() {
		$data = D('Project');
	}
}

?>