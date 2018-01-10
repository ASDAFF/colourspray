<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule('intec.unimagazinlite')){
	die();
}
$arResult = array();
$options = UniMagazinlite::getOptionsValue(SITE_ID);
$arResult["OPTIONS"] = $options;
if($options["SHOW_PANEL_SETTING"]["ACTIVE_VALUE"] == "Y"){
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/spectrum.js');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/spectrum.css');
	\Bitrix\Main\Data\StaticHtmlCache::getInstance()->markNonCacheable();
	$this->IncludeComponentTemplate();
}
if(isset($_POST["action"]) && $_POST["action"] == "select_theme"){	
	unset($_POST["action"]);
	foreach($_POST as $key => $post){
		UniMagazinlite::setOption(SITE_ID,$key, $post);
	}	
}

?>
