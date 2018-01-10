<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

if (!Loader::includeModule('iblock'))
	return;

$arTemplateParameters = array();

/* Отзывы */
$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock = array();
$iblockFilter = (
	!empty($arCurrentValues['REVIEWS_IBLOCK_TYPE'])
	? array('TYPE' => $arCurrentValues['REVIEWS_IBLOCK_TYPE'], 'ACTIVE' => 'Y')
	: array('ACTIVE' => 'Y')
);
$rsIBlock = CIBlock::GetList(array('SORT' => 'ASC'), $iblockFilter);
while ($arr = $rsIBlock->Fetch())
	$arIBlock[$arr['ID']] = '['.$arr['ID'].'] '.$arr['NAME'];
unset($arr, $rsIBlock, $iblockFilter);

$arTemplateParameters['PROJECTS_SECTION_URL'] = array(
	"PARENT" => "",
	"NAME" => GetMessage("PROJECTS_SECTION_URL"),
	"TYPE" => "STRING"
);

$arTemplateParameters['REVIEWS_SECTION_URL'] = array(
	"PARENT" => "",
	"NAME" => GetMessage("REVIEWS_SECTION_URL"),
	"TYPE" => "STRING"
);

$arTemplateParameters['REVIEWS_IBLOCK_TYPE'] = array(
	"PARENT" => "REVIEW_SETTINGS",
	"NAME" => GetMessage("REVIEWS_IBLOCK_TYPE"),
	"TYPE" => "LIST",
	"VALUES" => $arIBlockType,
	"REFRESH" => "Y"
);

$arTemplateParameters['REVIEWS_IBLOCK_ID'] = array(
	"PARENT" => "REVIEW_SETTINGS",
	"NAME" => GetMessage("REVIEWS_IBLOCK_IBLOCK"),
	"TYPE" => "LIST",
	"ADDITIONAL_VALUES" => "Y",
	"VALUES" => $arIBlock,
	"REFRESH" => "Y"
);

$arTemplateParameters['REVIEWS_COUNT'] = array(
	"PARENT" => "REVIEW_SETTINGS",
	"NAME" => GetMessage("REVIEWS_COUNT"),
	"TYPE" => "STRING"
);

/* - Отзывы - */

$arTemplateParameters['USE_SIMILAR_SERVICES'] = array(
	"NAME" => GetMessage("USE_SIMILAR_SERVICES"),
	"TYPE" => "CHECKBOX",
	'DEFAULT' => 'N'
);