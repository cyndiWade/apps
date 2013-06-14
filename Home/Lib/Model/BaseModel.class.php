<?php 


class BaseModel extends Model {
	

	//删除方法
	public function del($condition) {
		return $this->where($condition)->data(array('status'=>-2))->save();
	}
	
	
}
?>