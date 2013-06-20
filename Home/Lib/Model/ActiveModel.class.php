<?php 


/**
 * 活动表模型
 *
 */
class ActiveModel extends BaseModel {
	
	protected function _after_select(&$resultSet,$options) {
		foreach ($resultSet as &$value) {
			$value['time'] = date('Y-m-d H:i:s', $value['time']);
		}
	}
	
	
	//获取主页最新3条置顶活动
	public function getIndexList($app_id) {
		$data = $this->field('id,title,pics')->where(array('app_id'=>$app_id,'sort'=>1,'status'=>0))->limit('0,3')->select();
		
		parent::setFileUrl($data,array('pics'));
		$this->_after_select($data);
		return $data;
	}
	
	
	//获取所有活动列表
	public function getAllList($app_id) {
		$data = $this->field('id,title,pics')->where(array('app_id'=>$app_id,'status'=>0))->select();
		
		parent::setFileUrl($data,array('pics'));
		$this->_after_select($data);
		return $data;
	}
	
	
	//或许详细的活动信息
	public function getDetailed($id) {
		$data = $this->where(array('id'=>$id))->limit('1')->select();
		parent::setFileUrl($data,array('pics'));
		$this->_after_select($data);
		return $data;
		
	}
	
	
	
}



?>