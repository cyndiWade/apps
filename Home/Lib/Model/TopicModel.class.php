<?php
/**
 *主题表
 */

class TopicModel extends BaseModel {
	
	public function show($condition) {
		
		$data = $this->where($condition)->select();
		return $data;
	}
	
	
	//获取所有主题列表
	public function getAll ($app_id,$page) {
		$data = $this->query("
			SELECT 
							t.id,
							t.pid,
							t.user_id,
							t.content,
							(SELECT url FROM oa_file  WHERE id=t.voice LIMIT 1) AS voice_url,
							(SELECT url FROM oa_file  WHERE id=t.pic LIMIT 1) AS pic_url,
							t.new_comids
				FROM 
							oa_topic  AS t
			WHERE 
							app_id = '$app_id'
				AND
							status = '0'	
			LIMIT
							$page	
		");
		//重新组合地址
		parent::setFileUrl($data,array('voice_url','pic_url'));
		return $data;
	}
	
	
	//获取用户详细信息
	public function getOne($id) {
		$data =  $this->query("
			SELECT 
							t.id,
							t.pid,
							t.user_id,
							t.content,
							(SELECT url FROM oa_file  WHERE id=t.voice LIMIT 1) AS voice_url,
							(SELECT url FROM oa_file  WHERE id=t.pic LIMIT 1) AS pic_url
				FROM 
						oa_topic  AS t
			WHERE 
						id='$id'	
				LIMIT  1 					
		");
		parent::setFileUrl($data,array('voice_url','pic_url'));
		return $data;
		
	}
	


	
}
?>