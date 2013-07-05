<?php


class TestAction extends Action {
	
	
	// 活动列表
	public function index() {
		
		///$mem = new Memcache;
		//$mem->addServer('127.0.0.1',11211);
		//$mem->addServer('192.168.1.101',11211);
		//$mem->set('key',123, 0, 3);
		//echo $mem->get('key');
		
	//	dump($mem->getStats ());
	
		
		//$Cache = Cache::getInstance('Memcache',array('host'=>'127.0.0.1','port'=>11211,'timeout'=>false,'persistent'=>false));
		//$Cache->set('key',123);
	//	echo $Cache->get('key');
		
		$user = D('User');
		$info = $user->getUserById(1);
		dump($info);
	}
	
	

}
?>