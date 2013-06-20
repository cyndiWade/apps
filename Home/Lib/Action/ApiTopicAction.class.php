<?php 

/**
 * 	对外接口-----主题模块
 */
class ApiTopicAction extends ApiAuthBaseAction {
	

	
	//主题数据列表显示
	public function index() {
		
		$Topic = D('Topic');					//主题表
		$Papauser = D('Papauser');		//用户表
		$File = D('File');						//文件表
		$Comment = D('Comment');		//评论表
		$app_id = $this->oApp->id;		//公司id

		//获取所有主题数据列表
		$topicList = $Topic->getAll($app_id);
		
		//获取所有当前主题下所有评论数据id
		$allField =  getArrayByField($topicList,'new_comids');
		$ids = array();	//保存有的评论id
		foreach ($allField AS $val) {
			if (!empty($val)) array_push($ids,$val);
		}
		$ids = implode(',',$ids);			//把最新评论的id,组合成字符串

		//获取所有主题评论
		$allCom = $Comment->all_com($ids);
		//按照主题id，归类评论
		$groupCom = setArrayKey($allCom,'tid');

		//把评论添加到主题中
		foreach ($topicList AS $key=>$val) {
			$topicList[$key]['comments'] = $groupCom[$val['id']];
		}

		//print_r($topicList);
		$this->callback(STATUS_SUCCESS, '获取成功',$topicList);
	}
	
	
	
	/**
	 * 添加主题(语音、图片、文字)
	 */
	public  function add() {
		
		if ($this->isPOST()) {
			//连接数据库
			$Topic = D('Topic');							//主题表
			$File = D('File');								//文件表
			
			//手机Post提交数据的数据
			$Topic->create();										
			$Topic->app_id = $this->oApp->id;			//公司id
			$Topic->user_id = $this->oUser->id;			//用户id
			
			$Topic->time = time();								//上传时间
			//文件数据
			$picFile = $_FILES['pic_file'];					//上传图片信息
			$voiceFile = $_FILES['voice_file'];				//上传音频信息

			//------上传文件处理--------
			//1、上传图片文件
			if (!empty($picFile['name'])) {
				$PicInfo = parent::ApiUpload($picFile,'pic');		
				$File->type = 1;																//图片类型
				$File->size = $PicInfo[0]['size'];								//文件大小
				$File->url = $PicInfo[0]['savename'];							//文件路径
				$pid = $File->add();															//保存到数据库 
				if ($pid) $Topic->pic = $pid;												
			}
			//2、上传音频文件
			if (!empty($voiceFile['name'])) {
				$voiceInfo = parent::ApiUpload($voiceFile,'voice');	
				$File->type = 2;																//音频类型
				$File->size = $voiceInfo[0]['size'];								//文件大小
				$File->url = $voiceInfo[0]['savename'];						//文件路径
				$vid = $File->add();															//保存到数据库 
				if ($vid) $Topic->voice = $vid;
			}
			
			//保存到数据库
			if ($Topic->add()) {
				$this->callback(STATUS_SUCCESS, '添加成功');
			} else {
				$this->callback(STATUS_ERROR, '添加失败！');
			}

		}

	}
	
	
	
	
	
	
}

?>