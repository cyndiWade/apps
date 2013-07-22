<?php 

/**
 * APP接口 --	获取数据条数
 */
class ApiTotalAction extends ApiBaseAction {
	
	private $table;					//操作的表对象

	protected $aVerify = array(//需要验证的方法
		//	'getNums',
	);
	
// 	public function __construct() {
// 		parent::__construct();
		
// 		$this->_manage();
// 	}
	
	//验证表名
	private function _manage() {
		$type = $this->_get('type');

		if (empty($type)) {
			parent::callback(STATUS_ERROR,'没有指定表');
		} else {
			$this->table = D($type);
		}
		
	}

	
	//获取案例数量
	public function get_nums () {
		$type = $this->_get('type');

		if (empty($type)) parent::callback(STATUS_ERROR,'没有指定表');
				
		switch ($type) {
			case 'case':
				$condition = array('app_id'=>$this->oApp->id,'status'=>0);
				$this->table = D('Case');	//实例表
				break;
			case 'designer' :
				$condition = array('app_id'=>$this->oApp->id,'type'=>1,'status'=>0);
				$this->table = D('User');	//实例表
				break;
			default:
				parent::callback(STATUS_ERROR,'没有指定数据');
		}
		
		$num =  $this->table->where($condition)->field('id')->select();
		parent::callback(STATUS_SUCCESS,'获取成功',$num);
	
	}
	
	
	

}

?>