<?
	$arTemplateParameters = array(
		"DISPLAY_COUNT" => array(
			"PARENT" => "VISUAL",
			"NAME" => GetMessage('parameters.show_count.name'),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
			"REFRESH" => "Y"
		)
	);
	
	if ($arCurrentValues['DISPLAY_COUNT'] == "Y")
	{
		$arTemplateParameters["DISPLAY_COUNT_IF_EMPTY"] = array(
			"PARENT" => "VISUAL",
			"NAME" => GetMessage('parameters.show_count_if_empty.name'),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y"
		);
	}
	
	$arTemplateParameters["DISPLAY_TOTAL"] = array(
		"PARENT" => "VISUAL",
		"NAME" => GetMessage('parameters.show_total.name'),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y"
	);
?>