<?php 


class BaseModel extends Model {
	

	//删除方法
	protected function del($condition) {
		return $this->where($condition)->update(array('status'=>-2));
	}
	
	
}
?>