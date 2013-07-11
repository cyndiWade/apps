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
	
	//修改数据
	public function saveCase($cid) {
		return $this->where(array('id'=>$cid))->save();
	}
	
	public function _add() {
		return $this->add();
	}
	
	public function getPageList($appid, $page, $style, $type) {
		$condition = array(
			'app_id' => $appid,
			'status' => 0,	
		);
		if ($style > 0) {
			$condition['style'] = $style;
		}
		if ($type > 0) {
			$condition['room_type'] = $type;
		}		
		
		$this->where($condition);
		
		//$this->limit(filterNumList($page));
		$data = $this->select();

		return $data;
	} 
}



?>