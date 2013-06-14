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
	

	//获取所有设计师
	public function getDesigner ($_appid) {
		return $this->where(array('app_id'=>$_appid,'type'=>1))->field('id,nickname,avatar')->select();
	}
	

	protected function _after_select(&$resultSet,$options) {
		foreach ($resultSet as &$value) {
			$value['create_time'] = date('y-m-d H:i', $value['create_time']);
		}
	}

}



?>