<?php 


/**
 * APP模型
 *
 */
class AppModel extends BaseModel {
	protected  $trueTableName = 'oa_apps';
	
	public function getApp($id) {
		if (empty($id)) return null;
		
		$data = $this->where(array('id'=>$id))->find();
		
		return empty($data) ? null : (object) $data;
	}
	
}



?>