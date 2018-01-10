<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?$mainContactEnabled = (!empty($arParams['MAIN_ELEMENT_ID']) || !empty($arParams['MAIN_ELEMENT_CODE']))?>
<?if ($mainContactEnabled):?>
	<?$ElementID = $APPLICATION->IncludeComponent(
		"bitrix:news.detail",
		"",
		Array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
			"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
			"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
			"ELEMENT_ID" => $arParams["MAIN_ELEMENT_ID"],
			"ELEMENT_CODE" => $arParams["MAIN_ELEMENT_CODE"],
			"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
			"ADD_SECTIONS_CHAIN" => "N",
			"ADD_ELEMENT_CHAIN" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"SET_TITLE" => $arParams['SET_TITLE'],
			'CONTACT_FORM_ID' => $arParams['CONTACT_FORM_ID']
		),
		$component
	);?>
	<div class="clear"></div>
	<div class="uni-indents-vertical indent-30"></div>
<?endif;?>
<??>
