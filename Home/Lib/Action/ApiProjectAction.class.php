<?php 

/**
 * 	项目列表
 */
class ApiProjectAction extends ApiBaseAction {

	protected $aVerify = array(
		'create', 'director', 'index',
			
	);//需要验证的方法
	
	/*
	 * 项目列表
	 */
	public function index() {
	
		if ($this->oUser->type == 2) {
			$data = D('Project')->getListCommon($this->oApp->id, $this->oUser->id);
		} else {
			$data = D('Project')->getListExpert($this->oApp->id, $this->oUser->id);
		}
		
		$this->callback(STATUS_SUCCESS, '获取成功！', $data);
	}
	
	/*
	 * 项目经理负责的项目列表
	 */
	public function director() {
		$data = D('Project')->getDirectorProject($this->oApp->id, $this->oUser->id);
		
		$this->callback(STATUS_SUCCESS, '获取成功！', $data);
	}
	
	/*
	 * 创建项目
	 */
	public function create() {
		if ($this->isPost()) {
			$data = $_POST;
			$data['uid'] = $this->oUser->id;
			$data['app_id'] = $this->oApp->id;
			if (D('Project')->add($data)) {
				$this->callback(STATUS_SUCCESS, '项目创建成功！');
			} else {
				$this->callback(STATUS_ERROR, '项目创建失败！');
			}
		} else {
			//发送项目经理数据
			$data = D('User')->getDirectorList($this->oApp->id);
			
			$this->callback(STATUS_SUCCESS, '获取项目经理数据！', $data);
		}
		
	}

}

?>