<?php 


/**
 * Session模型
 *
 */
class SessionModel extends BaseModel {
	
	/*
	 * 验证key是否有效，有效则返回uid，否则返回false
	 */
	public function check($key) {
		$data = $this->where(array('key'=>$key))->find();
		//超过2小时过期
		if (($data['expire'] + 7200) < time()) {
			return false;
		} else {
			//更新有效期
			$this->where(array('id'=>$data['id']));
			$this->data(array('expire' => time() + 7200))->save();
			
			return $data['uid'];
		}
	}
	
	/*
	 * 生成sessionKey
	 */
	public function makeKey($oUser) {
		$key = $oUser->id . '|' . $oUser->account . '|' . $oUser->password . '|' . mt_rand();
		$key = md5($key);
		
		$data = array(
			'key' => $key,
			'expire' => time() + 7200,	
		);
		$this->where(array('uid' => $oUser->id))->data($data)->save();
		
		return $key;
	}
}



?>