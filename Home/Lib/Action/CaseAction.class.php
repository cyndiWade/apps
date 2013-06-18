<?php

/**
 * 案例控制器
 *
 */
class CaseAction extends BaseAction {
	
	
	/**
	 * 上传操作图片操作
	 * @param unknown_type $CasePics
	 * @param unknown_type $app_id
	 * @param unknown_type $cid
	 */
	private function upImg($CasePics,$app_id,$cid) {
		$pics = parent::upload();	//执行上传操作
		//上传文件写入数据库
		if ($pics) {
			foreach ($pics AS $key=>$val) {
				$CasePics->app_id = $app_id;		//公司id
				$CasePics->cid = $cid;						//案例id
				$CasePics->url = $val['savename'];		//图片地址
				$CasePics->add();
			}
		}
	} 
	
	
	//案例列表
	public function show() {
		$Case = D('Case');	//案例表
		$app_id = $this->oUser->app_id;	//公司id

		$all = $Case->getAllCase($app_id);
		setTime($all);
		
		$this->assign('all',$all);
		$this->display();
	}
	
	
	//添加案例
	public function add() {
		$Case = D('Case');	//案例表
		$User = D('User');		//用户表
		$CasePics = D('CasePics');	//案例图片表
		$app_id = $this->oUser->app_id;	//公司id

		//提交数据
		if ($this->isPOST()) {
			
			$Case->create();			//表单提交的数据
			$Case->app_id = $app_id;			//公司id

			$Case->time = time();											//当前时间
			$cid = $Case->_add();			
			if ($cid) {	
				$this->upImg($CasePics,$app_id,$cid);			//执行上传操作
				$this->success('添加成功！','?s=/Case/show');	
				exit;
			}
		}

		//读取用户数据
		$designers = $User->getDesigner($app_id);
		$this->assign('designers',$designers);
		$this->display();
		
	}
	
	
	//编辑案例
	public function edit() {
		$Case = D('Case');	//案例表
		$User = D('User');		//用户表
		$CasePics = D('CasePics');	//案例图片表
		$cid = $_GET['cid'];	//案例id
		$app_id = $this->oUser->app_id;	//公司id
		
		//更新数据
		if ($this->isPOST()) {
			$Case->create();
			$Case->saveCase($cid);									//修改数据
			$this->upImg($CasePics,$app_id,$cid);			//执行上传操作
			$this->success('已更新');
			exit;
		}
		
		//项目数据
		$caseInfo = $Case->getOneCase($cid);
		parent::check_power($caseInfo['app_id']);	//验证是否为该公司数据
		
		//案例图片
		$pics = $CasePics->getPic($cid);
		
		//读取设计师数据
		$designers = $User->getDesigner($app_id);


		$this->assign('caseInfo',$caseInfo);
		$this->assign('pics',$pics);
		$this->assign('designers',$designers);
		$this->display();
	}
	
	
	//删除案例
	public function del() {
		$Case = D('Case');	//案例表
		$id = $this->_get('cid');		//项目id
		$Case->del(array('id'=>$id)) ? $this->success('删除成功') : $this->error('删除失败');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 * 测试
	 */
	
	public function demo() {
		if ($this->isPOST()) {
			dump($_FILES);
			if (!empty($_FILES['pic']['name'])) $pic = $this->ApiUpload($_FILES['pic'],'pic');
			if (!empty($_FILES['video']['name'])) $video = $this->ApiUpload($_FILES['video'],'video');
			print_r($pic);	
			print_r($video);
		}
	
		$this->display();
	}
	
	

	//IOS统一上传文件方法
	private function ApiUpload($file,$type) {
		if ($type == 'pic')  {
			$allowExts  = array('jpg', 'gif', 'png', 'jpeg');
			$dir = C('TMPL_PARSE_STRING.__IMAGES__');
			
		} elseif ($type == 'video') {
			$allowExts = array('mp3');
			$dir = C('TMPL_PARSE_STRING.__VIDEO__');
		}
	
		import('ORG.Net.UploadFile');				//引入上传类
		$upload = new UploadFile();
		$upload->maxSize  = 3145728 ;			// 设置附件上传大小
		$upload->allowExts  = $allowExts;		// 上传文件的(后缀)（留空为不限制），，
		//上传保存
		$upload->savePath =  $dir;					// 设置附件上传目录
		$upload->autoSub = true;					// 是否使用子目录保存上传文件
		$upload->subType = 'date';					// 子目录创建方式，默认为hash，可以设置为hash或者date日期格式的文件夹名
		$upload->saveRule =  'uniqid';				// 上传文件的保存规则，必须是一个无需任何参数的函数名
		
		$execute = $upload->uploadOne($file);		//执行上传
		//执行上传操作
		if(!$execute) {						// 上传错误提示错误信息
			$status = 'error';
			$info = $upload->getErrorMsg();
		}else{// 上传成功 获取上传文件信息
			$status = 'success';
			$info =  $execute;
		}
		return array("status"=>"$status","info"=>$info);
	}
	
}


?>