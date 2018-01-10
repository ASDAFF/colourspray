<?
    if (CModule::IncludeModule('intec.startshop'))
	{
        if (!empty($arResult['ID']))
    	{
    		$arCatalogItem = CStartShopCatalogProduct::GetByID($arResult['ID'], $arParams['CURRENCY'])->Fetch();
            $arResult['MIN_PRICE'] = $arCatalogItem['STARTSHOP']['MIN_PRICE'];
        }
    }
?>