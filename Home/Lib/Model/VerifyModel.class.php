<?php 


/**
 * 手机验证码
 *
 */
class VerifyModel extends BaseModel {
	
	public function getVerify($telephone) {
		$verify = mt_rand(100001,999999);
		$data = array(
			'telephone' => $telephone,
			'verify' => $verify,	
			'expired' => time() + 120,	
		);
		
		$this->add($data);
		
		return $verify;
	}
	
	public function check($telephone, $verify) {
		$aWhere = array(
			'telephone' => $telephone,
			'verify' => $verify,
			'status' => 0,
		);
		
		$data = $this->where($aWhere)->order('expired DESC')->find();
		
		if (empty($data) || $data['expired'] < time()) {
			return false;
		} else {
			$this->data(array('status' => 1))->where($aWhere)->save();
			return true;
		}
	}
}



?>