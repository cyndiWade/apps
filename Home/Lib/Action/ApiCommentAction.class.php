<?php 

/**
 * 	对外接口-----评论类
 */
class ApiCommentAction extends ApiBaseAction {
	protected $aVerify = array(
		'add',
	);
	
	/**
	 * 回复消息
	 */
	public  function add() {
		
		if ($this->isPOST()) {
			//连接数据库
			$Topic = D('Topic');							//主题表
			$File = D('File');								//文件表
			$Comment = D('Comment');				//评论表
			$tid = $this->_post('tid');					//主题id
			
			$Comment->create();
			$Comment->app_id = $this->oApp->id;		//公司id
			$Comment->uid = $this->oUser->id;			//用户id
			$Comment->tid = $tid;								//主题id
			$Comment->time = time();						//上传时间
			
			//上传图片处理
			$voiceFile = $_FILES['voice_file'];						//上传音频信息
			if (!empty($voiceFile['name'])) {
				$voiceInfo = parent::ApiUpload($voiceFile,'voice');		//上传音频文件
				$File->type = 2;															//音频类型
				$File->size = $voiceInfo[0]['size'];									//文件大小
				$File->url = $voiceInfo[0]['savename'];							//文件路径
				$vid = $File->add();														//保存到数据库
				if ($vid) $Comment->voice = $vid;
			}
			
			$cid = $Comment->add();		//写入数据库
			//保存到数据库
			if ($cid) {
				$this->set_com($Topic,$tid,$cid);		//更新主题下最新3条评论			
				$this->callback(STATUS_SUCCESS, '评论成功');
			} else {
				$this->callback(STATUS_ERROR, '添加失败！');
			}
			
		}
		
	//	$this->display('demo');		

	}
	
	
	/**
	 * 更新主题下最新3条评论，并且增加一条评论数
	 * @param unknown_type $obj
	 * @param unknown_type $tid
	 * @param unknown_type $cid
	 */
	private function set_com($obj,$tid,$cid) {
		//获取最新评论数
		$condition = array(
			'id'=>$tid,
		);
		
		$comids = $obj->where($condition)->getField('new_comids');

		if (empty($comids)) {	//如果没有最新评论，则把评论id追加到字段中
			$String = $cid;
		} else {
			//更新最新3条评论数据
			$arr = explode(',',$comids);				//解析成数组
			array_unshift($arr,$cid);					//入栈
			if (count($arr>3)) unset($arr['3']);		//删除最后一位
			$String = implode(',',$arr);					//重新拼接成字符串
		}
		
		//'num'=>array('exp','num+1'),	//评论数加1
		//array('new_comids'=>$String)
		
		$data['num'] = array('exp','num+1');	//评论数加1
		$data['new_comids'] = $String;
		$obj->where(array('id'=>$tid))->save($data);
	}
	
	
	
	
	
	
	
}

?>