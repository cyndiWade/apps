<?php

//案例图片控制器
class CasePicsAction extends Action {
	
	
	//编辑图片内容
	public function edit() {
		if ($this->isPOST()) {
	
			$CasePics = D('CasePics');
			$type = $this->_post('type');	//操作类型
			$mid = $this->_post('mid');	//操作的图片id
			$info = $this->_post('info');	//评论内容
			
			if ($type == 'save') {
				$return = $CasePics->_save($mid,$info);
			} elseif ($type == 'select') {
				$return =  $CasePics->getPicInfo($mid);
			} elseif ($type == 'del') {
				$return =  $CasePics->del(array('id'=>$mid));
			} else {
				exit('非法操作');
			}
			
			echo $return;
		} else {
			exit('非法操作');
		}
	}
	
	

}
?>