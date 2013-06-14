<?php


class UserAction extends BaseAction {
	
	
	// 设计师列表
	public function designer() {
		$M = D('User');
		$condition = array(
			'app_id' => $this->oApp->id,
			'type' => 1,
			'status' => 0,
		);
		$data = $M->where($condition)->select();
		
		$this->assign('data', $data);
		$this->display();
	}

}
?>