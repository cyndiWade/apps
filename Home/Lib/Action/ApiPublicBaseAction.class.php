<?php 

/**
 * 对外接口公共类(不需要登录)
 */
class ApiPublicBaseAction extends ApiBaseAction {
	
	public function __construct() {
		parent::__construct();
	}
	
}

?>