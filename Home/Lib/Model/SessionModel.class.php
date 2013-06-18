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
	
}



?>