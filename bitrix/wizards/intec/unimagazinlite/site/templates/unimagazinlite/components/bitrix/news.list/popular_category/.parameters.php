<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
    "GRID_SIZE" => Array(
		"NAME" => GetMessage("GRID_SIZE"),
		"TYPE" => "LIST",
        "VALUES" => Array(
            "2" => "2",
            "3" => "3",
            "4" => "4"
        ),
		"DEFAULT" => "4",
	),
	"TEXT_TITLE" => Array(
		"NAME" => GetMessage("TEXT_TITLE"),
		"TYPE" => "TEXT",
		"DEFAULT" => "",
	),
);
?>
