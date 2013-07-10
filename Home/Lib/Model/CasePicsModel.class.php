<?php 


/**
 * 案例图片模型
 *
 */
class CasePicsModel extends BaseModel {

	//获取所有图片
	public function getPic ($cid) {
		return $this->where(array('cid'=>$cid,'status'=>0))->select();
	}

	//修改图片信息
	public function _save($mid,$info) {
		return $this->where(array('id'=>$mid))->save(array('info'=>$info));
	}
	
	//获取图片评论信息
	public function getPicInfo($mid) {
		return $this->where(array('id'=>$mid))->getField('info');
	}
	
	protected function _after_select(&$resultSet,$options) {
		foreach ($resultSet as &$value) {
			$value['url'] = visitUrl($value['url']);
		}
	}
	
	public function getPageList($appid, $page, $style, $type) {
		$condition = array(
				'app_id' => $appid,
				'status' => 0,
		);
		if ($style > 0) {
			$condition['style'] = $style;
		}
		if ($type > 0) {
			$condition['type'] = $type;
		}
	
		$this->where($condition);
	
		//$this->limit(filterNumList($page));
		$data = $this->select();
	
		return $data;
	}
	
}



?>