<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
    $arResult = array();
    $arResult['COMPARE'] = array();
    
    session_start();
    
    $arCompareItems = $_SESSION[$arParams["COMPARE_NAME"]][$arParams["IBLOCK_ID"]]["ITEMS"];
    
    if(is_array($arCompareItems))
    {
        foreach ($arCompareItems as $arCompareItem)
        {
            $arCompare = $arCompareItem;
            $arCompare['ADD_SELECTOR'] = str_replace(array('#ID#'), array($arCompare['ID']), $arParams['COMPARE_ADD_MASK']);
            $arCompare['ADDED_SELECTOR'] = str_replace(array('#ID#'), array($arCompare['ID']), $arParams['COMPARE_ADDED_MASK']);
            $arResult['COMPARE'][] = $arCompare;
        }
    }
	
	$arResult['BASKET'] = array();
	$arBasketItems = array();
	if (CModule::IncludeModule('intec.startshop')) {
		$res = CStartShopBasket::GetList(array(),array(),array(),array(),false, SITE_ID);
		while ($el = $res->Fetch()) {
			$arBasketItems[]['ID'] = $el['ID'];
		}
	}
	if (!empty($arBasketItems)) {
		foreach ($arBasketItems as $arBasketItem)
        {
            $arBasket = $arBasketItem;
            $arBasket['ADD_SELECTOR'] = str_replace(array('#ID#'), array($arBasket['ID']), $arParams['BASKET_ADD_MASK']);
            $arBasket['ADDED_SELECTOR'] = str_replace(array('#ID#'), array($arBasket['ID']), $arParams['BASKET_ADDED_MASK']);
            $arResult['BASKET'][] = $arBasket;
        }
	}
	
?>
<?$this->IncludeComponentTemplate();?>