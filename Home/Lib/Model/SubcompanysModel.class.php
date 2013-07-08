<?php 


/**
 * 公司门店信息表
 */
class SubcompanysModel extends BaseModel {
	
	
	public function getOneInfo ($id,$app_id) {
		return $this->where(array('id'=>$id,'app_id'=>$app_id))->find();
	}
}



?>