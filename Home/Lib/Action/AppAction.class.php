<?php


class AppAction extends BaseAction {
	
	
	// 公司信息
	public function index() {
		if ($this->isPost()) {
			$data = array(
					'name' =>$_POST['name'],
					'info' =>$_POST['info'],
			);
			$files = $this->upload();
			$data['logo'] = $files[0]['savename'];
			
			D('App')->where(array('id' => $this->oApp->id))->data($data)->save();
			$_SESSION['app'] = (object) $data;
			$this->success('保存成功！');
		} else {
			$this->assign('data', (array) $this->oApp);
			$this->display();
		}
	}

}
?>