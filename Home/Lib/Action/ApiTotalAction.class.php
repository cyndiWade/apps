<?php 

/**
 * APP接口 --	获取数据条数
 */
class ApiTotalAction extends ApiBaseAction {
	
	private $table;					//操作的表对象

	protected $aVerify = array(//需要验证的方法
		//	'getNums',
	);
		
	//一次获取去指定记录条数
	public function index() {
		$data = array(
			'case' => D('Case')->where( array('app_id'=>$this->oApp->id,'status'=>0))->count(),
			'designer' =>	D('User')->where(array('app_id'=>$this->oApp->id,'type'=>1,'status'=>0))->count(),	
		);
		parent::callback(STATUS_SUCCESS,'获取成功',$data);
	}
	

	//动态获取
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