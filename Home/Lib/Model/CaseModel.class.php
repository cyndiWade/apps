<?php 


/**
 * 案例模型
 *
 */
class CaseModel extends BaseModel {
	

	
	//获取所有案例数据
	public function getAllCase($app_id) {
		return $this->where(array('app_id'=>$app_id,'status'=>0))->select();
	}
	
	//获取一条案例数据
	public function getOneCase($id) {
		return $this->where(array('id'=>$id,'status'=>0))->find();
	}
	
	
	public function _add() {
		return $this->add();
	}
	
	
}



?>