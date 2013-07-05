<?php 

/**
 * 	对外接口-----主题模块
 */
class ApiTopicAction extends ApiBaseAction {
	
	protected $aVerify = array(//需要验证的方法
			'add',
	);
	
	//主题数据列表显示
	public function index() {		
		$Topic = D('Topic');					//主题表
		$Comment = D('Comment');		//评论表
		$app_id = $this->oApp->id;		//公司id
		$page = filterNumList($this->_post('page'));	
		//$page= '0,10';
		
		//获取所有主题数据列表
		$topicList = $Topic->getAll($app_id,$page);
		
		//获取所有当前主题下所有评论数据id
		$allField =  getArrayByField($topicList,'new_comids');
		$ids = array();	//保存有的评论id
		foreach ($allField AS $val) {
			if (!empty($val)) array_push($ids,$val);
		}
		$ids = implode(',',$ids);			//把最新评论的id,组合成字符串

		//获取指定主题评论
		$allCom = $Comment->all_com($ids);
		//按照主题id，归类评论
		$groupCom = setArrayKey($allCom,'tid');

		//把评论添加到主题中
		foreach ($topicList AS $key=>$val) {
			$topicList[$key]['comments'] = $groupCom[$val['id']];
		}
	//	dump($topicList);

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
			
			//Post提交数据的数据
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
				$File->type = 1;														//图片类型
				$File->size = $PicInfo[0]['size'];									//文件大小
				$File->url = $PicInfo[0]['savename'];							//文件路径
				$pid = $File->add();													//保存到数据库 
				if ($pid) $Topic->pic = $pid;												
			}
			//2、上传音频文件
			if (!empty($voiceFile['name'])) {
				$voiceInfo = parent::ApiUpload($voiceFile,'voice');	
				$File->type = 2;														//音频类型
				$File->size = $voiceInfo[0]['size'];								//文件大小
				$File->url = $voiceInfo[0]['savename'];						//文件路径
				$vid = $File->add();													//保存到数据库 
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
	
	
	/**
	 * 获取详细主题，以及主题下的评论
	 */
	public function detailed () {
		$Topic = D('Topic');					//主题表
		$Comment = D('Comment');		//评论表
		$tid = $this->_post('tid');			//当前主题id
		$page = filterNumList($this->_post('page'));	//获取数据条数
// 		$tid= 2;a
// 		$page = '0,10';
		
		//获取当前主题数据
		$detailed = $Topic->getOne($tid);		
		$detailed= $detailed[0];
		if (!empty($detailed)) {
			
			//评论数据，评论数据
			$arrCom = $Comment->getComList($tid,$page);	
			
			$return = array(
				'topic'=>$detailed,
				'comments' =>$arrCom
			);
			$this->callback(STATUS_SUCCESS, '获取成功',$return);
		} else {
			$this->callback(STATUS_ERROR, '主题不存在');
		}
		
	}
	
	
	
}

?>