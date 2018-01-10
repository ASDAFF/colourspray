<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule("iblock"))
	return;
$arTemplateParameters = array(	
	"TEXT_BANNERS" => Array(
		"NAME" => GetMessage("TEXT_BANNERS"),
		"TYPE" => "TEXT",
		"DEFAULT" => GetMessage("TEXT_BANNERS_DEFAULT"),
	)
);
$arTemplateParameters["LINE_ELEMENT_COUNT"] = Array(
	"NAME" => GetMessage("LINE_ELEMENT_COUNT"),
	"TYPE" => "LIST",
    "VALUES" => array(
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5"
    ),
	"DEFAULT" => "4",
);
?>