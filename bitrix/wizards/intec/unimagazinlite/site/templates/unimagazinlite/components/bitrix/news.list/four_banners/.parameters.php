<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule("iblock"))
	return;
$arTemplateParameters = array(	
	"TEXT_BANNERS" => Array(
		"NAME" => GetMessage("TEXT_BANNERS"),
		"TYPE" => "TEXT",
		"DEFAULT" => GetMessage("TEXT_BANNERS_DEFAULT"),
	),
	"LINE_ELEMENT_COUNT" => Array(
		"NAME" => GetMessage("LINE_ELEMENT_COUNT"),
		"TYPE" => "TEXT",
		"DEFAULT" => "4"
	)
);
?>