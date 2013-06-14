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
	
}



?>