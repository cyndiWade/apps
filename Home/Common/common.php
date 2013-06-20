<?php
define('STATUS_SUCCESS', "0");//获取成功
define('STATUS_ERROR', "1001");//其他错误
define('STATUS_NOT_LOGIN', "1002");//未登录

/*	判断是否为post提交
 * @$value  post提交的值
*/
function isPost($value) {
	//是post提交 ，并且post值存在，或者post值不为空
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && sizeof($value) && !empty($value)) {
		return true;
	} else {
		return false;
	}

}

/**
 * 计算天数，返回日期函数
 * @param num or string $month		月
 * @param num or string $year		年
 * @param num or string $day			日
 * @param num or string $type		返回时间类型
 * @return string 	date
 */
function getDateNum($day,$month,$year,$type = 't') {
	return date($type,mktime(0,0,0,$month,$day,$year));
}



//二个提交的数据是否一致
function checkEquals ($_data,$_otherdate) {
	if (trim($_data) != trim($_otherdate)) return false;
	return true;
}


//判断提交数据是否为空
function dataIsNull ($data) {
	if (trim($data) == '') return true;
	return false;
}
//时间数据转换
function time_conversion($data){
	$arr=explode("/",$data);
	return date("Y-m-d",mktime(0,0,0,$arr[0],$arr[1],$arr[2]));
}
function time_conversion_2($data){
	$arr=explode("-",$data);
	return $arr[1].'/'.$arr[2].'/'.$arr[0];
}


/**
 * 获取数组val值中的字段
 * @param Array $arr
 * @param string $field
 * return Array
 */
function getArrayByField(&$arr,$field, $key = '') {
	$aRet = array();
	if ($key !== '') {
		foreach ($arr AS $aVal) {
			$aRet[$aVal[$key]] = $aVal[$field];
		}
	} else {
		foreach ($arr AS $aVal) {
			$aRet[] = $aVal[$field];
		}
	}
	return $aRet;
}

/**
 * 根据Val值，重新排序数组
 * @param Array $arr
 * @param unknown_type $k
 */
function setArrayKey(&$arr,$k) {
	$aRet = array();
	foreach ($arr AS $key=>$val) {
		$aRet[$val[$k]][] = $arr[$key];
	}
	return $aRet;
}





/**
 * 2.预防SQL注入，转义非法字符
 * @param unknown_type $str
 * @return Ambigous <unknown, string>
 */
function setString($str) {
	return get_magic_quotes_gpc() ? $str : addslashes($str);
}
/**
 * 3.把转译的字符返回没有转义前的样子
 * @param string $str
 * @return string
 */
function unSetString($str) {
	return stripslashes($str);
}
//4.预防SQL注入
function setSql($_str) {
	if (is_array($_str)) {	//数组
		foreach ($_str as $_key => $_value) {
			$_string[$_key] =  setSql($_value);
		}
	} else if (is_object($_str)) {	//对象
		foreach ($_str as $_key => $_value) {
			$_string->$_key =  setSql($_value);
		}
	} else {	//字符串
		$_string = setString($_str);
	}
	return $_string;
}


function setTime(&$all) {
	foreach ($all AS $key=>$val) {
		$all[$key]['time'] = date('Y-m-d H:i:s',$val['time']);
	}
}


//模拟HTTP请求
function send_http($content,$_URL) {
	$top = 'apps';
	$headers = array(
		//	'Authorization: key=' . $top,
			'Content-Type: application/x-www-form-urlencoded'		
			//application/json   multipart/form-data  application/x-www-form-urlencoded
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $_URL);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);	//头文件信息
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $content);	//请求信息

	$result = curl_exec($ch);
	if ($result === FALSE) {
		die('Problem occurred: ' . curl_error($ch));
	}

	curl_close($ch);

	return $result;
}

/*
 * 获取request变量
 */
function getRequest($name, $default = '') {
	if (isset($_POST[$name])) {
		return $_POST[$name];
	} elseif (isset($_GET[$name])) {
		return $_GET[$name];
	} else {
		return $default;
	}
}

/*
 * 过滤逗号分割的数字字符串 如 1,2,3
 */
function filterNumList($numlist, $separator = ',') {
	$aNums = explode($separator, $numlist);
	
	foreach ($aNums as &$value) {
		$value = intval($value);
	}
	
	return join($separator, $aNums);
}

//文件访问地址
function visitUrl($file_url,$type) {
	if ($type == 'img') return 'http://'.C('PUBLIC_FILE').C('TMPL_PARSE_STRING.__IMAGES__').$file_url;
	if ($type == 'video') return 'http://'.C('PUBLIC_FILE').C('TMPL_PARSE_STRING.__VIDEO__').$file_url;
}


//数组的插入与删除
/**
 * 5、数组任意部位插入新的值，保持排序
 * @param data  		$data		插入的数据
 * @param num	 	$num		插入的位置
 * @param array 		 $array		要操作的数组
 * @return array
 */
function InsertValArray($data,$num,&$array) {
	for ($i=count($array);$i>$num;$i--) {
		$array[$i] = $array[$i-1];	//把数组的值向后移动
	}
	$array[$num] =  $data;			//在指定位置插入数据
	//return $array;
}

?>