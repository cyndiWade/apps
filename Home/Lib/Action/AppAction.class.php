<?php


class AppAction extends BaseAction {
	
	
	// 公司信息
	public function index() {
		if ($this->isPost()) {
			$data = array(
					'name' =>$_POST['name'],
					'info' =>$_POST['info'],
					'phone' => $_POST['phone'],
					'contact' => $_POST['contact'],
			);

			if (!empty($_FILES['logo']['name'])) {
				$files = $this->upload();
				$data['logo'] = $files[0]['savename'];
			}
			
			D('App')->where(array('id' => $this->oApp->id))->data($data)->save();
			
			$data = array_merge((array) $this->oApp, $data);

			$_SESSION['app'] = (object) $data;
			$this->success('保存成功！');
		} else {
			$this->assign('data', (array) $this->oApp);
			$subcompanys = D('Subcompanys')->where(array('appid' => $this->oApp->id))->select();
			$this->assign('subcompanys', $subcompanys);
			
			$this->display();
		}
	}

}
?>