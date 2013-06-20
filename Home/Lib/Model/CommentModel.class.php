<?php
/**
 * 评论表
 */

class CommentModel extends BaseModel {
	
	public function show($condition) {
		
		$data = $this->where($condition)->select();
		return $data;
	}
	
	//获取指定条数评论
	public function all_com($ids) {
		$data =  $this->query("
			SELECT 
							c.id,
							c.tid,
							c.uid,
							c.content,
							(SELECT url FROM oa_file  WHERE id=c.voice LIMIT 1) AS voice_url,
							(SELECT avatar FROM oa_users  WHERE id=c.uid LIMIT 1) AS pic_url
				FROM 
							oa_comment  AS c
			WHERE
							c.id in ($ids)
		");
		parent::setFileUrl($data,array('voice_url','pic_url'));
		return $data;
	}
	

	
	public function add() {
		return $this->add();
	}
	
	public function del($condition) {
		return $this->where($condition)->delete();
	}

	
}
?>