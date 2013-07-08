<?php


class AppAction extends BaseAction {


	// 公司信息
	public function index() {
		$Area = D('Area');


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
			$subcompanys = D('Subcompanys')->where(array('appid' => $this->oApp->id,'status'=>0))->order('id ASC')->select();

			foreach ($subcompanys AS $key=>$val) {
				$subcompanys[$key]['address'] = $Area->getStrArea($val['area']).$val['address'];
			}

			$this->assign('subcompanys', $subcompanys);
			$this->display();
		}

	}




	//信息编辑
	public function edit () {
		$Subcompanys = D('Subcompanys');
		$id = $this->_get('id');
		$app_id = $this->oApp->id;

		if ($this->isPOST()) {
			$Subcompanys->create();
			$Subcompanys->app_id = $app_id;
			$area = array($this->_post('region'),$this->_post('area')) ;
			$Subcompanys->area = implode(',',$area);

			if (empty($Subcompanys->id)) {
				$Subcompanys->time = time();
				$Subcompanys->add() ? $this->success('添加成功') : $this->error('添加失败');
			} else {
				$Subcompanys->save() ? $this->success('编辑成功') : $this->error('编辑失败');
			}		
			exit;
		} 

		$info = $Subcompanys->getOneInfo($id,$app_id);
		if (!empty($info)) {
			$return = array(
				'status' => 1,
				'info' =>$info,
			);
		} else {
			$return = array(
				'status' =>0,
				'info' =>$info,
			);
		}
		echo JSON($return);
	}


	//AJAX地区联动
	public function AjaxArea() {
		//$this->assign('areaHtml', D('Area')->getHtml());
// 		$Area = D('Area');
// 		$fid = $this->_get('fid');
// 		$region = $Area->get_fid_area($fid);
// 		echo JSON($region);
		$region = $this->_get('region');
		$area = $this->_get('area');
		echo D('Area')->getHtml($region,$area);
	}

	//删除
	public function del() {
		$Subcompanys = D('Subcompanys');
		$id = $this->_get('id');
		$Subcompanys->del(array('id'=>$id,'app_id'=>$this->oApp->id)) ? $this->success('删除成功') : $this->error('删除失败');
		exit;
	}



}
?>