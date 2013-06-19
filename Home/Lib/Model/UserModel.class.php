<?php 


/**
 * User模型
 *
 */
class UserModel extends BaseModel {
	protected  $trueTableName = 'oa_users';
	
	public function getUser($account,$company) {
		if (empty($account) || empty($company)) return null;
		
		$data = $this->where(array('account'=>$account,'app_id'=>$company))->find();
		return empty($data) ? null : (object) $data;
	}
	
	public function getUserByUid($uid) {
		if (empty($uid)) return null;
	
		$data = $this->where(array('id' => $uid))->find();
		return empty($data) ? null : (object) $data;
	}
	

	//获取所有设计师
	public function getDesigner ($_appid) {
		return $this->where(array('app_id'=>$_appid,'type'=>1,'status'=>0))->field('id,nickname,avatar')->select();
	}
	
	//获取一条用户数数据
	public function getOneDate ($id,$app_id) {
		$data = $this->where(array('id'=>$id,'app_id'=>$app_id))->find();
		return empty($data) ? null : (object) $data;
	}
	

	protected function _after_select(&$resultSet,$options) {
		foreach ($resultSet as &$value) {
			$value['create_time'] = date('Y-m-d H:i:s', $value['create_time']);
		}
	}
	
	public function addUser($data) {
		$uid = $this->add($data);
		if (empty($uid)) {
			return false;
		}
		
		return $this->getUserByUid($uid);
	}
}



?>