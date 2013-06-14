<?php 


/**
 * APP模型
 *
 */
class ActiveModel extends BaseModel {
	protected function _after_select(&$resultSet,$options) {
		foreach ($resultSet as &$value) {
			$value['time'] = date('y-m-d H:i', $value['time']);
		}
	}
	
}



?>