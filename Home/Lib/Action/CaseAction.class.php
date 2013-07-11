<?php

/**
 * 案例控制器
 *
 */
class CaseAction extends BaseAction {
	
	//设计师
	private $designers;
	
	//风格
	private $style = array(
		array('id'=>'1','content'=>'简约'),
		array('id'=>'2','content'=>'中式'),
		array('id'=>'3','content'=>'欧美'),
		array('id'=>'4','content'=>'地中海'),
		array('id'=>'5','content'=>'异域'),
		array('id'=>'6','content'=>'混搭'),		
	);
	
	//房间类型
	private $roomType = array(
		array('id'=>'1','content'=>'厨房'),
		array('id'=>'2','content'=>'卫浴'),
		array('id'=>'3','content'=>'客厅'),
		array('id'=>'4','content'=>'卧室'),
		array('id'=>'5','content'=>'餐厅'),
		array('id'=>'6','content'=>'儿童房'),
		array('id'=>'7','content'=>'书房'),
		array('id'=>'8','content'=>'整体衣帽间'),
		array('id'=>'9','content'=>'玄关'),
		array('id'=>'10','content'=>'阳台阳光房'),
		array('id'=>'11','content'=>'楼梯'),
		array('id'=>'12','content'=>'储藏室'),
		array('id'=>'13','content'=>'其他空间'),
		array('id'=>'14','content'=>'户外庭院'),
	);
	
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
				$this->success('添加成功！','?s=/Case/edit/cid/'.$cid);	
			} else {
				$this->error('添加失败，请重新尝试');
			}
			exit;
		}
			
		//生成设计师、风格、功能相的HTML
		$this->addHtml();
		
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
			$Case->create();												//获取表单数据
			$style = $this->_post('style');								//案例风格	
			
			//修改案例数据
			$daStatus = $Case->saveCase($cid);				
			//执行上传图片
			$upStatus = $this->upImg($CasePics,$app_id,$cid);			
			//修改图片的风格
			$CasePics->where(array('cid'=>$cid))->data(array('style'=>$style))->save();
			
			if ($daStatus || $upStatus) {
				$this->success('已更新','?s=/Case/show');
			} else {
				$this->error('没有被更新');
			}
			exit;
		}
		
		//项目数据
		$caseInfo = $Case->getOneCase($cid);
		parent::check_power($caseInfo['app_id']);	//验证是否为该公司数据
		
		//案例图片
		$pics = $CasePics->getPic($cid);

		//生成设计师、风格、功能相的HTML
		$this->addHtml(array(
			'designers' => $caseInfo['uid'],
			'style' => $caseInfo['style'],
		));
		
		$this->assign('caseInfo',$caseInfo);
		$this->assign('pics',$pics);
		$this->display();
	}
	
	
	//删除案例
	public function del() {
		$Case = D('Case');	//案例表
		$id = $this->_get('cid');		//项目id
		$Case->del(array('id'=>$id)) ? $this->success('删除成功') : $this->error('删除失败');
	}
	
	
	
	
/**
 * 以下是私有方法
 */
	
	/**
	 * 生成HTML
	 */
	private function addHtml(Array $arr=array()) {

		//设计师
		$this->designers = D('User')->getDesigner($this->oUser->app_id);
		foreach ($this->designers AS &$val) {
			$val['id'] == $arr['designers'] ? $selected = 'selected="selected"' : $selected = '';	//加首选
			$designersHtml .= "<option value={$val['id']} $selected>{$val['nickname']}</option>";
		}
		
		//风格
		foreach ($this->style AS &$val) {
			$val['id'] == $arr['style'] ? $selected = 'selected="selected"' : $selected = '';	//加首选
			$styleHtml .= "<option value={$val['id']} $selected>{$val['content']}</option>";
		}
		
		//功能
		$roomTypeHtml .= "<option value='0' >---请选择---</option>";
		foreach ($this->roomType AS &$val) {
			$val['id'] == $arr['type'] ? $selected = 'selected="selected"' : $selected = '';	//加首选
			$roomTypeHtml .= "<option value={$val['id']} $selected>{$val['content']}</option>";
		}

		$this->assign('designersHtml',$designersHtml);
		$this->assign('styleHtml',$styleHtml);
		$this->assign('roomTypeHtml',$roomTypeHtml);
	}
	
	
	/**
	 * 上传操作图片操作-保存到数据库
	 * @param Object $CasePics  案例表对象
	 * @param String	 $app_id		公司ID
	 * @param String  $cid				项目ID
	 */
	private function upImg($CasePics,$app_id,$cid) {
		$pics = parent::upload();					//执行上传操作->并且返回地址
		//上传文件写入数据库
		if ($pics) {
			foreach ($pics AS $key=>$val) {
				$CasePics->app_id = $app_id;				//公司id
				$CasePics->cid = $cid;							//案例id
				$CasePics->url = $val['savename'];		//图片地址
				$CasePics->add();
			}
			return true;
		} else {
			return false;
		}
	}
	
	
	
	
	
	
	
	/**
	 * 测试---以下忽视掉。。。。
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