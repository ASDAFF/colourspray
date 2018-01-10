<?
$arItemsIDs = array();

foreach ($arResult["ITEMS"] as $arItem)
    $arItemsIDs[] = $arItem['ID'];

if (!empty($arItemsIDs) && CModule::IncludeModule('intec.startshop'))
{
    $rsElements = CIBlockElement::GetList(array(), array("ID" => $arItemsIDs), false);
    
    $arItems = array();
    while ($arElement = $rsElements->GetNext())
        $arItems[$arElement['ID']] = $arElement;
        
    $arCatalogItems = array();
    $arCatalogItemsTemp = CStartShopCatalogProduct::GetList(array(), array(
       'ID' => $arItemsIDs
    ));
    
    foreach ($arCatalogItemsTemp as $arCatalogItem)
        $arCatalogItems[$arCatalogItem['ID']] = $arCatalogItem;
        
    unset($arCatalogItemsTemp);
        
    foreach ($arResult['ITEMS'] as $sKey =>$arElement)
    {
        if (!empty($arItems[$arElement['ID']]["PREVIEW_PICTURE"])):
            $arResult["ITEMS"][$sKey]["PREVIEW_PICTURE"] = CFile::GetByID($arItems[$arElement['ID']]["PREVIEW_PICTURE"])->GetNext();
			$arResult["ITEMS"][$sKey]["PREVIEW_PICTURE"]['SRC'] = CFile::GetPath($arItems[$arElement['ID']]["PREVIEW_PICTURE"]);
		endif;
        
		if (!empty($arItems[$arElement['ID']]["DETAIL_PICTURE"])):
            $arResult["ITEMS"][$sKey]["DETAIL_PICTURE"] = CFile::GetByID($arItems[$arElement['ID']]["DETAIL_PICTURE"])->GetNext();
			$arResult["ITEMS"][$sKey]["DETAIL_PICTURE"]['SRC'] = CFile::GetPath($arItems[$arElement['ID']]["DETAIL_PICTURE"]);
        endif;
        
        $arResult["ITEMS"][$sKey]['PRICES'] = $arCatalogItems[$arElement['ID']]['STARTSHOP']['PRICES'];
        $arResult["ITEMS"][$sKey]['MIN_PRICE'] = $arCatalogItems[$arElement['ID']]['STARTSHOP']['MIN_PRICE'];
    }
}

$prop = array();
$prop_arr = array();

foreach( $arResult["ITEMS"] as $arItem ):
	foreach( $arItem["DISPLAY_PROPERTIES"] as $arProp ):
		if( !empty($arProp["VALUE"]) ):
			$prop_arr[$arProp["ID"]] = $arProp["ID"];
		endif;
	endforeach;
    foreach( $arItem["OFFER_DISPLAY_PROPERTIES"] as $arProp ):
		if( !empty($arProp["VALUE"]) ):
			$prop_arr[$arProp["ID"]] = $arProp["ID"];
		endif;
	endforeach;
endforeach;

foreach( $arResult["ITEMS"] as $arItem ):
	foreach( $arItem["DISPLAY_PROPERTIES"] as $arProp ):
		if( array_key_exists($arProp["ID"], $prop_arr) ):
			$prop[$arProp["CODE"]]["NAME"] = $arProp["NAME"];
			$prop[$arProp["CODE"]]["ITEMS"][$arItem["ID"]] = $arProp;
		endif;
	endforeach;
    foreach( $arItem["OFFER_DISPLAY_PROPERTIES"] as $arProp ):
		if( array_key_exists($arProp["ID"], $prop_arr) ):
			$prop[$arProp["CODE"]]["NAME"] = $arProp["NAME"];
            $arProp["VALUE"] = $arProp["DISPLAY_VALUE"];
			$prop[$arProp["CODE"]]["ITEMS"][$arItem["ID"]] = $arProp;
		endif;
	endforeach;
endforeach;

$arResult["DISPLAY_PROPERTIES"] = $prop;

$arResult["START_POSITION"] = 1;
$arResult["END_POSITION"] = 4;

foreach( $arResult["ITEMS"] as &$arItem ) {
		   
		   if (!empty($arItem['ID'])) {
				$arProduct = CStartShopCatalogProduct::GetByID(
					$arItem['ID'],
					array(),
					array(),
					($arParams['USE_COMMON_CURRENCY'] == "Y" && !empty($arParams['CURRENCY']) ? $arParams['CURRENCY'] : false),
					$arParams['PRICE_CODE']
				)->Fetch();

				if (!empty($arProduct)) { //print_r($arProduct);
					$arItem['STARTSHOP'] = $arProduct['STARTSHOP'];
				}
				}	   
	   }unset($arItem);
?>