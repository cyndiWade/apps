<?php
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
	foreach ($arr AS $aVal) {
		$aRet[$aVal[$k]] = $aVal;
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


?>