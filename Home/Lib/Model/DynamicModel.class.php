<?php 


/**
 * 动态模型
 *
 */
class DynamicModel extends BaseModel {
	
	/*
	 * 发送动态消息
	 */
	function send($uid, $msg, $link_id, $type) {
		$data = array(
			'uid' => $uid,
			'type' => $type,
			'msg' => $msg,
			'link_id' => $link_id,
			'time' => time(),
		);
		
		return $this->add($data);
	}
	
	/*
	 * 设为已读
	 */
	function setReaded($id) {
		$this->where(array('id' => $id))->data(array('isread' => 1))->save();
	}
}



?>