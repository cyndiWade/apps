<?php 


/**
<<<<<<< HEAD
 * 项目表
=======
 * 项目模型
>>>>>>> f11b1de17eff952ba58cd9f90c561b1dbad92170
 *
 */
class ProjectModel extends BaseModel {
	
<<<<<<< HEAD
	
	//获取项目列表
	public function getProList ($firstRow,$listRows) {
		$data =  $this->where(array('status'=>0))->limit($firstRow.','.$listRows)->select();
		parent::setTime($data);	//格式化日期
		return $data;
	}
	
	
	//获取数据条数
	public function getCount($condition) {
		return $this->where($condition)->count();
	}
	
	
=======
	public function getList($appid) {
		return $this->where(array('app_id'=>$appid))->select();
	}
	
	public function getDirectorProject($appid, $uid) {
		return $this->where(array('app_id'=>$appid, 'touid' => $uid))->select();
	}
	
>>>>>>> f11b1de17eff952ba58cd9f90c561b1dbad92170
}



?>