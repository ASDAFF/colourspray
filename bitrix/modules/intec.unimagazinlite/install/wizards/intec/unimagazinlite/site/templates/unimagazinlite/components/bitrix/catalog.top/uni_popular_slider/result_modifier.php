<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>
<?
    $sComparePath = parse_url($arParams['COMPARE_PATH']);
    $sComparePath = $sComparePath['path'];
    
    foreach ($arResult['ITEMS'] as $iKey => $arItem)
    {
        $arResult['ITEMS'][$iKey]['COMPARE_REMOVE_URL'] = $sComparePath.'?action=DELETE_FROM_COMPARE_LIST&id='.$arItem['ID'];
    }

    if (CModule::IncludeModule('intec.startshop'))
	{
	   $arItems = array();
       
	   foreach ($arResult['ITEMS'] as $iKey => $arItem)
           $arItems[] = $arItem['ID'];
           
       if (!empty($arItems))
		{
           $arCatalogItems = CStartShopCatalogProduct::GetList(array(), array(
               'ID' => $arItems
           ));
           
           $arItems = array();
           
           foreach ($arCatalogItems as $arCatalogItem)
               $arItems[$arCatalogItem['ID']] = $arCatalogItem;
               
           foreach ($arResult['ITEMS'] as $iKey => $arItem)
           {
               $arResult['ITEMS'][$iKey]['PRICES'] = $arItems[$arItem['ID']]['STARTSHOP']['PRICES'];
               $arResult['ITEMS'][$iKey]['MIN_PRICE'] = $arItems[$arItem['ID']]['STARTSHOP']['MIN_PRICE'];
           }
               
        } 

		$arItemsIDs = array();
		foreach ($arResult['ITEMS'] as $arItem)
			$arItemsIDs[] = $arItem['ID'];

		if (!empty($arItemsIDs))
		{
			$arProducts = array();
			$dbProducts = CStartShopCatalogProduct::GetList(
				array(),
				array('ID' => $arItemsIDs),
				array(),
				array(),
				(!empty($arParams['CURRENCY']) ? $arParams['CURRENCY'] : false),
				$arParams['PRICE_CODE']
			);

			while ($arProduct = $dbProducts->GetNext())
				$arProducts[$arProduct['ID']] = $arProduct;

			foreach ($arResult['ITEMS'] as $sKey => $arItem)
				if (!empty($arProducts[$arItem['ID']]))
					$arResult['ITEMS'][$sKey]['STARTSHOP'] = $arProducts[$arItem['ID']]['STARTSHOP'];
		} 
    }
?>