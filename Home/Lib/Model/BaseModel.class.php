<?php 


class BaseModel extends Model {
	

	//删除方法
	public function del($condition) {
		return $this->where($condition)->data(array('status'=>-2))->save();
	}
	
	
	/**
	 * 组合外部访问地址
	 * @param Array $data	数组
	 * @param String $fields 要组合的url地址字段
	 */
	protected function setFileUrl (&$data,$fields) {
		for ($i=0;$i<count($data);$i++) {
			foreach ($data[$i] AS $key=>$val) {
				if (in_array($key,$fields)) {
					$data[$i][$key] = visitUrl($val);
				}
			}
		}
	}
	

	
	/**
	 * 格式化日期
	 * @param unknown_type $all
	 */
	protected function setTime(&$all) {
		foreach ($all AS $key=>$val) {
			$all[$key]['time'] = date('Y-m-d H:i:s',$val['time']);
		}
	}
	

	/**
	 * 按照条件查询所有数据
	 * @param String $userids  1,2,3	查询条件
	 * @param String  $k  排序字段规则
	 * @param String $fields 需要查找的字段
	 */
	public function getDataById($userids, $k='id', $fields='*')  {
		$condition[$k]  = array('in',$userids);
		$data =  $this->where($condition)->field($fields)->select();
	
		return setArrayKey($data, $k);
	}

	
}
?>