<?php

/**
 * 项目管理控制器
 *
 */
class ProjectAction extends BaseAction {
	
	
	//主页显示
	public function index() {
		
		import('ORG.Util.Page');	//分页类
		$Project = D('Project');		//项目表
		
		$Page = new Page($Project->getCount(array('status'=>0)),10);		//分页初始化
		$list = $Project->getProList($Page->firstRow,$Page->listRows);		//分页后的数据

		$Page->setConfig('header','<span style=";">条记录</span>');//设置样式
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','尾页');
		
		//替换以后样式到
		$Page->setConfig('theme','共 %totalRow% %header% %nowPage%/%totalPage%  页    %first%  %upPage%  %linkPage%  %downPage%  %end% ');
		
		$this->assign('list',$list);
		$this->assign('page',$Page->show());	//显示分页
		$this->display();
	}
	
	
	//编辑项目
	public function edit() {
		$Project = D('Project');		//项目表
		$User = D('User');				//用户表
		$app_id = $this->oApp->id;		//当前
		$id = $this->_get('id');
		
		//更新数据
		if ($this->isPOST()) {
			$Project->create();
			$Project->where(array('id'=>$id))->save() ? $this->success('更新成功') : $this->error('没有数据被修改');
			exit;
		}
		
		//获取当前项目信息
	//	$detailed = $Project->where(array('id'=>$id,'app_id'=>$app_id))->find();

		$detailed = $Project->query("
				SELECT
							name,
							(SELECT account FROM oa_users  WHERE id=uid LIMIT 1) AS uname,
							province,
							city,
							region,
							area,
							style,
							budget,
							community,
							road,
							number,
							touid,
							time
				FROM
							oa_project
				WHERE
							id = '$id'
					AND
							app_id = '$app_id'	
				");
		$detailed = $detailed[0];
		if (empty($detailed)) $this->error('对不起，此项目不存在');
		
		//读取项目经理数据列表
		$amaldar = $User->getAmaldar($app_id);

		$this->assign('amaldar',$amaldar);
		$this->assign('detailed',$detailed);
		$this->display();
	
	}
	
	
	
	//删除项目
	public function del() {	
		$Project = D('Project');		//项目表
		$id = $this->_get('id');		//项目id
		$Project->del(array('id'=>$id,'app_id'=>$this->oApp->id)) ? $this->success('删除成功') : $this->error('删除失败');
		
	}
	
	
	
	
	
}


?>