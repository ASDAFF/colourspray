<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("CUSTOM_ELEMENT_NAME"),
	"DESCRIPTION" => GetMessage("CUSTOM_ELEMENT_DESCRIPTION"),
	"COMPLEX" => "N",
	"SORT" => 10,
	"PATH" => array(
		"ID" => "content",
		"CHILD" => array(
			"ID" => "custom.element",
			"NAME" => GetMessage("CUSTOM_ELEMENT_NAME"),
			"SORT" => 30,
		)
	)
);
?>