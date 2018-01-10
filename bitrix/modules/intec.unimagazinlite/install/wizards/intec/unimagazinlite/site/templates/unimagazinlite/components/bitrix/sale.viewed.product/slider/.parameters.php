<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arTemplateParameters = array(
	"VIEWED_TITLE" => array(
		"NAME" => GetMessage("TITLE_VIEW_PRODUCT"),
		"TYPE" => "STRING",
		"DEFAULT" => GetMessage("VIEWED_TITLE_DEFAULT"),		
		"PARENT" => "BASE",
	),
	"LINE_ELEMENT_COUNT" => array(
		"NAME" => GetMessage("LINE_ELEMENT_COUNT"),
		"TYPE" => "STRING",
		"DEFAULT" => "4",		
		"PARENT" => "BASE",
	),
	"VIEWED_IMG_HEIGHT" => array(
		"NAME" => GetMessage("VIEWED_IMG_HEIGHT"),
		"TYPE" => "STRING",
		"MULTIPLE" => "N",
		"DEFAULT" => "150",
		"COLS" => 5,
		"PARENT" => "BASE",
	),
	"VIEWED_IMG_WIDTH" => array(
		"NAME" => GetMessage("VIEWED_IMG_WIDTH"),
		"TYPE" => "STRING",
		"MULTIPLE" => "N",
		"DEFAULT" => "150",
		"COLS" => 5,
		"PARENT" => "BASE",
	)
);
?>