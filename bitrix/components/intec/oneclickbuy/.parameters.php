<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
    use Bitrix\Main\Loader;

    if (!Loader::includeModule('iblock'))
    	return;
    
    $arIBlockTypes = CIBlockParameters::GetIBlockTypes();
    
    $arIBlocks = array();
    $arIBlockFilter = (
    	!empty($arCurrentValues['IBLOCK_TYPE'])
    	? array('TYPE' => $arCurrentValues['IBLOCK_TYPE'], 'ACTIVE' => 'Y')
    	: array('ACTIVE' => 'Y')
    );
    $rsIBlocks = CIBlock::GetList(array('SORT' => 'ASC'), $arIBlockFilter);
    while ($arIBlock = $rsIBlocks->Fetch())
    	$arIBlocks[$arIBlock['ID']] = '['.$arIBlock['ID'].'] '.$arIBlock['NAME'];
    unset($arIBlock, $rsIBlocks, $arIBlockFilter);
    
    $arComponentParameters = array(
    	"PARAMETERS" => array(
    		"IBLOCK_TYPE" => array(
    			"NAME" => GetMessage("IBLOCK_TYPE"),
    			"TYPE" => "LIST",
    			"VALUES" => $arIBlockTypes,
    			"REFRESH" => "Y",
    		),
    		"IBLOCK_ID" => array(
    			"NAME" => GetMessage("IBLOCK_IBLOCK"),
    			"TYPE" => "LIST",
    			"ADDITIONAL_VALUES" => "Y",
    			"VALUES" => $arIBlocks,
    			"REFRESH" => "Y",
    		),
    		"COMPARE_NAME" => array(
    			"NAME" => GetMessage("COMPARE_NAME"),
    			"TYPE" => "STRING"
    		),
            "COMPARE_ADD_MASK" => array(
    			"NAME" => GetMessage("COMPARE_ADD_MASK"),
    			"TYPE" => "STRING",
                "DEFAULT" => ".addToCompare#ID#"
    		),
            "COMPARE_ADDED_MASK" => array(
    			"NAME" => GetMessage("COMPARE_ADDED_MASK"),
    			"TYPE" => "STRING",
                "DEFAULT" => ".removeFromCompare#ID#"
    		),
            "COMPARE_ADD_SELECTOR" => array(
    			"NAME" => GetMessage("COMPARE_ADD_SELECTOR"),
    			"TYPE" => "STRING",
                "DEFAULT" => ".addToCompare"
    		),
            "COMPARE_ADDED_SELECTOR" => array(
    			"NAME" => GetMessage("COMPARE_ADDED_SELECTOR"),
    			"TYPE" => "STRING",
                "DEFAULT" => ".removeFromCompare"
    		),
			"BASKET_ADD_MASK" => array(
    			"NAME" => GetMessage("BASKET_ADD_MASK"),
    			"TYPE" => "STRING",
                "DEFAULT" => ".addToBasket#ID#"
    		),
            "BASKET_ADDED_MASK" => array(
    			"NAME" => GetMessage("BASKET_ADDED_MASK"),
    			"TYPE" => "STRING",
                "DEFAULT" => ".addedToBasket#ID#"
    		),
            "BASKET_ADD_SELECTOR" => array(
    			"NAME" => GetMessage("BASKET_ADD_SELECTOR"),
    			"TYPE" => "STRING",
                "DEFAULT" => ".addToBasket"
    		),
            "BASKET_ADDED_SELECTOR" => array(
    			"NAME" => GetMessage("BASKET_ADDED_SELECTOR"),
    			"TYPE" => "STRING",
                "DEFAULT" => ".addedToBasket"
    		)
    	)
    );
?>