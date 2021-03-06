<?php 


/**
 * 项目表


 *
 */
class ProjectModel extends BaseModel {
	

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
	
	

	public function getListCommon($appid, $uid) {
		return $this->where(array('app_id'=>$appid, 'uid' => $uid))->select();
	}
	
	public function getListExpert($appid, $uid) {
		return $this->where(array('app_id'=>$appid, 'touid' => $uid))->select();
	}
	
	public function getDirectorProject($appid, $uid) {
		return $this->where(array('app_id'=>$appid, 'touid' => $uid))->select();
	}
	

}



?>