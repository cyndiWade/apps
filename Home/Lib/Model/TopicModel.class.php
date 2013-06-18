<?php
/**
 *主题表
 */

class TopicModel extends BaseModel {
	
	public function show($condition) {
		
		$data = $this->where($condition)->select();
		return $data;
	}
	
	
	//获取用户详细信息
	public function one($condition) {
		return $this->query("
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
						id='$condition'	
				LIMIT  1 					
		");
	}
	


	
}
?>