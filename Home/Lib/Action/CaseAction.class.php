<?php

/**
 * 案例控制器
 *
 */
class CaseAction extends BaseAction {
	
	public function show() {
		$this->display();
	}
	
	
	public function add() {
	
		if ($this->isPOST()) {
			$Case = D('Case');
			$Case->create();			//表单提交的数据
			$Case->app_id = $this->oUser->app_id;			//公司id
			$Case->time = time();											//当前时间
			$state = $Case->_add();
			
			
		}

		
		
	}
	
}

?>