<?php 


/**
 * 项目模型
 *
 */
class ProjectModel extends BaseModel {
	
	public function getList($appid) {
		return $this->where(array('app_id'=>$appid))->select();
	}
	
	public function getDirectorProject($appid, $uid) {
		return $this->where(array('app_id'=>$appid, 'touid' => $uid))->select();
	}
	
}



?>