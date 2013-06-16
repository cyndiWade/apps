<?php


class UserAction extends BaseAction {
	

	/**	 设计师列表 ->>>>>已经统一整理到userList控制器中
	public function designer() {
		$M = D('User');
		$condition = array(
			'app_id' => $this->oApp->id,
			'type' => 1,
			'status' => 0,
		);
		$data = $M->where($condition)->select();
		
		$this->assign('data', $data);
		$this->display();
	}
	 */
	
	
	//用户列表
	public function userList() {
		
		$type = $this->_get('type');		//数据类型
	
		switch ($type) {
			case 'admin' :
				$title = '管理员用户';
				$data = $this->_getUserList(0);	//管理员数据
				break;
			case 'designer'	:
				$title = '设计师用户';
				$data = $this->_getUserList(1);	//设计师数据
				break;
			case 'user' :
				$title = '普通用户';
				$data = $this->_getUserList(2);	//用户数据
				break;
			case 'all' :
				$title = '所有用户';
				$data = $this->_getUserList();	//所有数据
				break;
			default:
				$this->error('非法操作');	
		}
		$this->assign('title',$title);
		$this->assign('data', $data);
		$this->display();
	}
	
	//添加用户
	public function add() {
		$User = D('User');						//用户表
		$app_id = $this->oApp->id;		//公司Id
		
		//添加数据
		if ($this->isPOST()) {
			//账号验证
			$account = $this->_post('account');
			$isHave = $User->getUser($account,$app_id);	//获取用户信息
			if ($isHave) $this->error('对不起，此用户已注册');
			
			//写入数据库
			$id = $this->_saveUser($User,'add');
			
			$id ? $this->success('添加成功！','?s=/User/edit/id/'.$id) : $this->error('添加失败！');
			exit;
		}
		$this->display();
	}
	
	//编辑用户数据
	public function edit () {
		$User = D('User');						//用户表
		$app_id = $this->oApp->id;		//公司Id
		$id = $this->_get('id');				//用户Id
		
		if ($this->isPOST()) {
			if (!$this->_post('password')) $this->error('密码不得为空');
			$this->_saveUser($User,'edit',$id) ? $this->success('修改成功') : $this->error('没有数据被修改');
			exit;
		}
		$info = $User->getOneDate($id,$app_id);
		if (empty($info)) $this->error('此用户不存在','?s=/User/add');
		
		
		
		$this->assign('info',$info);
		$this->display();
	}
	
	//删除用户
	public function del() {
		$User = D('User');		//用户表
		$id = $this->_get('id');		//项目id
		$User->del(array('id'=>$id)) ? $this->success('删除成功') : $this->error('删除失败');
	}
	
	
/*****
 * 以下是私有方法！
 */	
	//获取不同类型的用户数据
	private function _getUserList($type=null) {
		$User = D('User');
		$condition = array(
				'app_id' => $this->oApp->id,
				'status' => 0,
				'type' =>$type
		);
	
		if ($type === null) unset($condition['type']);
		return	$User->where($condition)->select();
	}
	
	
	/**
	 * 编辑用户数据
	 * @param Obj $User	//用户表对象
	 * @param String $type		//操作类型
	 * @param Int 		$id			//操作数据id
	 * @return Int 					//是否操作成功
	 */
	private function _saveUser ($User,$type,$id=null) {
		$app_id = $this->oApp->id;		//公司Id
		
		$User->create();
		$User->app_id = $app_id;
		$User->password = md5($User->password);
		$User->create_time = time();
		$User->last_login_ip = get_client_ip();
		//上传图片操作
		if (!empty($_FILES['avatar']['name'])) {
			$avatar = parent::upload();
			$User->avatar = $avatar[0]['savename'];
		}
		
		if ($type == 'add') {
			$return = $User->add();
		} elseif ($type == 'edit') {
			$return = $User->where(array('id'=>$id))->save();
		} else {
			$this->error('非法操作');
		}
		return $return;
	}

}
?>