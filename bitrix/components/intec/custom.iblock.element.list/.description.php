<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentDescription = array(
	"NAME" => GetMessage("CUSTOM_IBLOCK_ELEMENT_NAME"),
	"DESCRIPTION" => GetMessage("CUSTOM_IBLOCK_ELEMENT_DESCRIPTION"),
	"COMPLEX" => "N",
	"SORT" => 10,
	"PATH" => array(
		"ID" => "content",
		"CHILD" => array(
			"ID" => "custom.iblock.element",
			"NAME" => GetMessage("CUSTOM_IBLOCK_ELEMENT_NAME"),
			"SORT" => 30,
		)
	)
);
?>