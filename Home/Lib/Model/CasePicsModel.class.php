<?php 


/**
 * 案例图片模型
 *
 */
class CasePicsModel extends BaseModel {

	//获取图片
	public function getPic ($cid) {
		return $this->where(array('cid'=>$cid,'status'=>0))->select();
	}

	//添加图片
	public function _add() {
		return $this->add();
	}
}



?>