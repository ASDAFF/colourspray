<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule("iblock"))
	return;
$arTemplateParameters = array(
	"TEXT_RUBLICS" => Array(
		"NAME" => GetMessage("TEXT_RUBLICS"),
		"TYPE" => "TEXT",
		"DEFAULT" => GetMessage("TEXT_RUBLICS_DEFAULT"),
	)
);
?>