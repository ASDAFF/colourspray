<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"DISPLAY_DATE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_DATE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_NAME" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_NAME"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PICTURE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_PICTURE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PREVIEW_TEXT" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TEXT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"LINE_ELEMENT_COUNT" => Array(
        "PARENT" => "BASE",
        "NAME" => GetMessage("T_IBLOCK_LINE_ELEMENT_COUNT"),
        "TYPE" => "TEXT",
        "DEFAULT" => "3",
    ),
	"USE_GREY_BGN" => Array(
		"NAME" => GetMessage("USE_GREY_BGN"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	)

);
?>
