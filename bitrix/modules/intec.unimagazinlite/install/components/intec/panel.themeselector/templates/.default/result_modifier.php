<?
$options = $arResult["OPTIONS"];
$k = 0;
$new_options = array();
$JS_OBJECT_TOOLTIP = array();
foreach ($arResult["OPTIONS"] as $key => $opt){
	if(isset($opt["TOOLTIP_TEXT"]) || isset($opt["TOOLTIP_PICTURE"])){
		$JS_OBJECT_TOOLTIP[$key]["TOOLTIP_TEXT"] = $opt["TOOLTIP_TEXT"];
		$JS_OBJECT_TOOLTIP[$key]["TOOLTIP_PICTURE"] = "/bitrix/modules/intec.unimagazin/images/".$opt["TOOLTIP_PICTURE"];
		$JS_OBJECT_TOOLTIP[$key]["ACTIVE_VALUE"] = $key_val;
		$JS_OBJECT_TOOLTIP[$key][MD5]=md5($key);
	}
	$active_value = $opt["ACTIVE_VALUE"];
	
	if (!empty($opt['VALUE']) && is_array($opt['VALUE']))
	{
		foreach($opt["VALUE"] as $key_val => $val)
		{
			if(isset($val["TOOLTIP_TEXT"]) || isset($val["TOOLTIP_PICTURE"])){
				if($val["TOOLTIP_TEXT"] != ""){
					$JS_OBJECT_TOOLTIP[$key]["VALUE_TOOLTIP"][$key_val]["TOOLTIP_TEXT"] = $val["TOOLTIP_TEXT"];
				}
				if($val["TOOLTIP_PICTURE"]!=""){
					$JS_OBJECT_TOOLTIP[$key]["VALUE_TOOLTIP"][$key_val]["TOOLTIP_PICTURE"] = "/bitrix/modules/intec.unimagazin/images/".$val["TOOLTIP_PICTURE"];
				}
			}
			if($val["VALUE"] == $active_value) {
				$JS_OBJECT_TOOLTIP[$key]["ACTIVE_VALUE"] = $key_val;			
			}
		}
	}
	
	if(strpos($key,"GROUP:") !== false ){		
		$k = $key;
	}
	$new_options[$k][$key] = $opt;
}
$arResult["OPTIONS"] = $new_options;
$arResult["TOOL_TIP_JS"] = $JS_OBJECT_TOOLTIP;
?>