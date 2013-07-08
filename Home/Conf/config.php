<?php
if (!defined('THINK_PATH'))exit();


$DB = require("config.inc.php");	//数据库配置

//系统配置
$system = array(

	//路由配置
	'URL_MODEL'             => 3,							//URL重写，兼容模式  如：home.php?s=/User/user   或者  home.php/User/user
	'URL_ROUTER_ON'   => true, //开启路由
	'URL_HTML_SUFFIX' => '.html',	//URL伪静态
	
	//session及时区配置
	'SESSION_AUTO_START' => true,				//session常开
	'DEFAULT_TIMEZONE'=>'Asia/Shanghai', 	// 设置默认时区
	
	//分页配置
	'VAR_PAGE'=>'p',	
			
	//模板配置
	//'DEFAULT_THEME' => 'default',
	//'TMPL_ACTION_SUCCESS' => 'public:success',
	//'TMPL_ACTION_ERROR' => 'public:error',

	/*以下添加扩展配置*/
	'PREV_URL' => $_SERVER["HTTP_REFERER"],		//上一页地址配置

	//上传文件目录	
	'TMPL_PARSE_STRING' => array(
		'__IMAGES__' => 'data/images/',
		'__VIDEO__' => 'data/video/',
	),
		
	'OUTPUT_ENCODE' => false,

	//访问文件目录
	'PUBLIC_FILE' =>$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']).'/',
		
);


return array_merge($DB, $system);
?>