<?php


class ActiveAction extends BaseAction {
	
	
	// 活动列表
	public function index() {
		$M = D('Active');
		$condition = array(
			'app_id' => $this->oApp->id,
			'status' => 0,
		);
		$data = $M->where($condition)->select();
		
		$this->assign('data', $data);
		$this->display();
	}
	
	public function add() {
		if ($this->isPost()) {
			$data = $_POST;
			
			if (!empty($_FILES['pics']['name'])) {
				$files = $this->upload();
				$data['pics'] = $files[0]['savename'];
			}
			$data['time'] = time();
			$data['app_id'] = $this->oApp->id;
			
			if (D('Active')->add($data)) {
				$this->success('添加成功！');
			} else {
				$this->error('添加失败！');
			}
		} else {
			$this->display('edit');
		}
	}
	
	public function edit() {
		$M = D('Active');
		$condition = array(
			'id' => $_GET['id'], 
			'app_id' => $this->oApp->id,
		);
		$data = $M->where($condition)->find();
		if (empty($data)) {
			$this->error('该记录不存在！');
		}
	
		if ($this->isPost()) {
			$data = $_POST;
			
			if (!empty($_FILES['pics']['name'])) {
				$files = $this->upload();
				$data['pics'] = $files[0]['savename'];
			}
			
			if (D('Active')->where($condition)->data($data)->save()) {
				$this->success('修改成功！');
			} else {
				$this->error('修改失败！');
			}
		} else {
			$this->assign('data', $data);
			$this->display();
		}
	}
	
	public function delete() {
		$M = D('Active');
		$condition = array(
			'id' => $_GET['id'], 
			'app_id' => $this->oApp->id,
		);
		
		if ($M->del($condition)) {
			$this->success('删除成功！');
		} else {
			$this->error('删除失败！');
		}
	}

}
?>