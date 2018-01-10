<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock'))
	return;

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock = array();
$iblockFilter = (
	!empty($arCurrentValues['IBLOCK_TYPE'])
	? array('TYPE' => $arCurrentValues['IBLOCK_TYPE'], 'ACTIVE' => 'Y')
	: array('ACTIVE' => 'Y')
);
$rsIBlock = CIBlock::GetList(array('SORT' => 'ASC'), $iblockFilter);
while ($arr = $rsIBlock->Fetch())
	$arIBlock[$arr['ID']] = '['.$arr['ID'].'] '.$arr['NAME'];
unset($arr, $rsIBlock, $iblockFilter);

$arComponentParameters = array(
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
			"NAME" => GetMessage("IBLOCK_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y",
		),
		"IBLOCK_ID" => array(
			"NAME" => GetMessage("IBLOCK_IBLOCK"),
			"TYPE" => "LIST",
			"ADDITIONAL_VALUES" => "Y",
			"VALUES" => $arIBlock,
			"REFRESH" => "Y",
		),
		"ENABLE_HIT" => array(
			"NAME" => GetMessage("ENABLE_HIT"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N"
		),
		"ENABLE_RECOMMEND" => array(
			"NAME" => GetMessage("ENABLE_RECOMMEND"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N"
		),
		"ENABLE_NEWS" => array(
			"NAME" => GetMessage("ENABLE_NEWS"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N"
		),
		"ENABLE_STOCK" => array(
			"NAME" => GetMessage("ENABLE_STOCK"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N"
		),
		"DISPLAY_COMPARE"=>array(
			"NAME" => GetMessage("DISPLAY_COMPARE"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N"
		),
		"COMPARE_NAME" => array(
			"NAME" => GetMessage("COMPARE_NAME"),
			"TYPE" => "STRING",
			"DEFAULT" => "CATALOG_COMPARE_LIST"
		),
		"LINE_ELEMENT_COUNT" => array(
			"NAME" => GetMessage("LINE_ELEMENT_COUNT"),
			"TYPE" => "STRING",
			"DEFAULT" => "4"
		),
		"ELEMENT_COUNT" => array(
			"NAME" => GetMessage("ELEMENT_COUNT"),
			"TYPE" => "STRING",
			"DEFAULT" => "10"
		)
	)
)
?>