<?php 


class BaseModel extends Model {
	

	//删除方法
	public function del($condition) {
		return $this->where($condition)->data(array('status'=>-2))->save();
	}
	
	
	//组合url路径
	protected function setFileUrl (&$data,$fields) {
		for ($i=0;$i<count($data);$i++) {
			foreach ($data[$i] AS $key=>$val) {
				if (in_array($key,$fields)) {
					$data[$i][$key] = visitUrl($val);
				}
			}
		}
	}
	
}
?>