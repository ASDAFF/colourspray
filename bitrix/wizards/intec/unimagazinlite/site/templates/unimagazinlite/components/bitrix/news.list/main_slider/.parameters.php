<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"MODE_SLIDER" => Array(
		"NAME" => GetMessage("MODE_SLIDER"),
		"TYPE" => "LIST",
		"DEFAULT" => "horizontal",
		"VALUES" =>array("fade" => GetMessage("OPTION_FADE"),"horizontal" => GetMessage("OPTION_HORIZONTAL"),"vertical" => GetMessage("OPTION_VERTICAL"))
	),
	"SPEED_SLIDER" => Array(
		"NAME" => GetMessage("SPEED_SLIDER"),
		"TYPE" => "STRING",
		"DEFAULT" => "500",		
	),
	"USE_AUTOSCROLL" => Array(
		"NAME" => GetMessage("USE_AUTOSCROLL"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y"
	),
	"PAUSE_AUTOSCROLL" => Array(
		"NAME" => GetMessage("PAUSE_AUTOSCROLL"),
		"TYPE" => "STRING",
		"DEFAULT" => "4000",		
	),
	 "USE_ANIMATION" => Array(
        "NAME" => GetMessage("USE_ANIMATION"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y"
    )
);
?>
