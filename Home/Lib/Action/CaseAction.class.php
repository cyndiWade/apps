<?php

/**
 * 案例控制器
 *
 */
class CaseAction extends BaseAction {
	
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
			$state = $Case->_add();			
			if ($state) {
				$pics = parent::upload();	//执行上传操作
				//上传文件写入数据库
				if ($pics) {
					foreach ($pics AS $key=>$val) {
						$CasePics->app_id = $app_id;		//公司id
						$CasePics->cid = $state;				//案例id
						$CasePics->url = $val['savename'];		//图片地址
						$CasePics->add();
					}
				}
				$this->success('上传成功！');	
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
	
	
}

?>