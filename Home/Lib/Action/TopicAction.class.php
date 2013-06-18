<?php 

/**
 * 主题管理类
 */
class TopicAction extends BaseAction {
	
	
	
	/**
	 * 显示所有主题列表
	 */
	public function _show() {
		$Topic = D('Topic');					//主题表
		$Papauser = D('Papauser');		//用户表
		$File = D('File');						//文件表
		$Comment = D('Comment');		//评论表
		
		$list = $Topic->show(array('status'=>0));			//主题数据列表
		
		//用户数据
		$this->fixData($Papauser, $list, 'user_id','id,nickname');
		$this->fixData($File, $list, 'pic','id,url');
		$this->fixData($File, $list, 'voice','id,size,url');
		
		//评论数据处理
		$aComIds =  getArrayByField($list,'new_comids', 'id');		//找出数组中的new_comids字段，并且按照id分组
		$comIds =  implode(',',$aComIds);							
		if (!empty($comIds)) {
			$aComs = $Comment->getDataById($comIds,'id', '*');
		}
		$this->fixData($Papauser, $aComs, 'uid','id,account,header_pic');
		$this->fixData($File, $aComs, 'voice');
		
		//组合数据
		foreach ($list AS $key=>$val) {		//取得对应的用户数据
			$ids = explode(',',$aComIds[$val['id']]);
			$list[$key]['coms'] = array(
					$aComs[$ids[0]], 
					$aComs[$ids[1]],
					$aComs[$ids[2]],
			);
		}

		return $list;
		
	}	

	/**
	 * 模板方法
	 */
	public function show() {
		$data = $this->_show();
		$this->assign('list',$data);
		$this->display();
	}
	
	
	/**
	 * 评论显示
	 */
	public function comment() {

		$Topic = D('Topic');				//主题表
		$Comment = D('Comment');	//评论表
		
		$tid = setSql($_GET['tid']);			//主题ID(SQL注入过滤)
		

		//获取主题数据
		$index = $Topic->one($tid);
		
		if (count($index)) {
			//获取评论数据
			
			//获取总记录数
			import('@.ORG.Util.Page');	//分页类
			$count =  $Comment->getCount(array('tid'=>$tid));		//获取记录条数
			$Page = new Page($count,2);								
			$comList = $Comment->all_com($tid,$Page->firstRow,$Page->listRows);
		}
		$allList = array_merge($index,$comList);
		dump($index);
	}
	
	
	//添加评论
	public function add_com() {
		
	}
	

	
	/**
	 * 
	 * import('ORG.Util.Page');
		$Node = M('Node');
	
		$count = $Node->count();
		
		$Page = new Page($count,10);
				
		$map['id'] = array('gt','1');
		$list = $Node->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
	 * 
	 */
	
}


?>