<?php 
class AreaModel extends Model{


	public function getHtml($region = 0, $area = 0) {
		//读取数据
		$aRegion = $this->where('level = 2')->select();
		//小区范围
		$aAreas = $this->where('level = 3')->select();
		$aRes = array();
		$aRes[0][] = array('请选择范围', 0);
		foreach ($aAreas as $aArea) {
			if (isset($aRes[$aArea['fid']])) {
				$aRes[$aArea['fid']][] = array($aArea['name'], $aArea['id']);
			} else {
				$aRes[$aArea['fid']][] = array('请选择范围', 0);
			}
		}
		
		//区域select组装
		$str = "<select class='nostyle selectWidth' onchange='areaSelected(this)' name='region'>\n";
		$str .= "<option value=0 " . ($region == 0 ? "selected=selected" : "") . ">请选择区域</option>\n";
		foreach ($aRegion as $aValue) {
			//$str .= "<option value='". $aValue['id'] . ($region == $aValue['id'] ? "selected=selected" : "") ."'>" . $aValue['name'] . "</option>";
			$str .= "<option value='{$aValue['id']}' ".($region == $aValue['id'] ? "selected=selected" : "").">" . $aValue['name'] . "</option>";
		}
		$str .= "</select>&nbsp;&nbsp;";
//dump($aRes[$region]);
		//小区范围select组装
		$str .= "<select class='nostyle selectWidth' name='area'>".$this->dataToOptions($aRes[$region],$area)."</select><script>\n";
		$str .= "var areaData = " . json_encode($aRes) . ";\n";

		//定义js函数
		$str .= "var areaSelected = function(obj) {
			var oArea = obj.nextSibling.nextSibling;
			oArea.options.length = 0;
			for (x in areaData[obj.value]) {
				if (areaData[obj.value][x][1] >= 0) {
					oArea.options.add(new Option(areaData[obj.value][x][0], areaData[obj.value][x][1]));
				}
			}

			oArea.value = 0;
		}\n";

		$str .= "</script>";
		
		return $str;
	}
	
	private function dataToOptions($aData,$area) {
		$ret = '';
		foreach ($aData as $aValue) {
			$area == $aValue[1] ?  $select = "selected='selected'" : $select = '';
			$ret .= "<option value='$aValue[1]' $select>$aValue[0]</option>\n";
		}

		return $ret;
	}
	
	public function getName($region, $area) {
		$aRegion = $this->where(array('id' => $region))->find();
		$aArea = $this->where(array('id' => $area))->find();
		
		return $aRegion['name'] . ' ' . $aArea['name'];
	}
	
	
	
	
	
	
	public function getStrArea ($ids) {
		$data = $this->field('name')->where(array('id'=>array('in',$ids)))->select();
		foreach ($data AS $val) {
			$str .= $val['name'].',';
		}
		return $str;
	}
	
	
}
