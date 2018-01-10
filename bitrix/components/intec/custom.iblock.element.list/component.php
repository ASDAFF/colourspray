<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
    if (!CModule::IncludeModule('iblock'))
        return;

    $arResult = array();
    $arResult['ELEMENTS'] = array();
    
    $arDefaultParams = array(
        "USE_DETAIL_PICTURE" => "Y",
        "USE_PREVIEW_PICTURE" => "Y",
        "PICTURE_WIDTH" => "200",
        "PICTURE_HEIGHT" => "200",
		"IBLOCK_ELEMENTS_ID" => array(),
		"FILTER" => array(),
		"SORT" => array(),
        "IBLOCK_ID" => 0,
        "IBLOCK_SECTION" => 0,
        "IBLOCK_ELEMENTS_COUNT" => 0
    );
    
    $arParams = array_merge($arDefaultParams, $arParams);
    
    $arParams["IBLOCK_ELEMENTS_COUNT"] = intval($arParams["IBLOCK_ELEMENTS_COUNT"]);

	$arFilter = array();
    $arSort = array();
    
    if (!empty($arParams['IBLOCK_SORT_FIELD']) && !empty($arParams['IBLOCK_SORT_ORDER']))
        if (in_array($arParams['IBLOCK_SORT_ORDER'], array('asc', 'desc')))
            $arSort[$arParams['IBLOCK_SORT_FIELD']] = $arParams['IBLOCK_SORT_ORDER'];
    
	if (!empty($arParams['IBLOCK_TYPE']))
		$arFilter['IBLOCK_TYPE'] = $arParams['IBLOCK_TYPE'];
	
	if (is_numeric($arParams['IBLOCK_ID']) && $arParams['IBLOCK_ID'] > 0)
		$arFilter['IBLOCK_ID'] = $arParams['IBLOCK_ID'];
	
    if (is_numeric($arParams['IBLOCK_SECTION']) && $arParams['IBLOCK_SECTION'] > 0)
        $arFilter['SECTION_ID'] = $arParams['IBLOCK_SECTION'];
        
    if (!empty($arParams['IBLOCK_SECTION_CODE']))
        $arFilter['SECTION_CODE'] = $arParams['IBLOCK_SECTION_CODE'];
    
	if (!empty($arParams['IBLOCK_ELEMENTS_ID']))
		$arFilter['ID'] = $arParams['IBLOCK_ELEMENTS_ID'];
	
	$arFilter = array_merge($arParams['FILTER'], $arFilter);
    $arSort = array_merge($arParams['SORT'], $arSort);
	
	$rsElements = CIBlockElement::GetList(
		$arSort, 
		$arFilter
	);
    
    if (!empty($arFilter['IBLOCK_ID']) && $APPLICATION->GetPublicShowMode())
    {
        $iIBlockID = $arParams['FILTER']['IBLOCK_ID'];
        if (CModule::IncludeModule('iblock'))
        {
            $arButtons = CIBlock::GetPanelButtons(
				$arParams["IBLOCK_ID"],
                0,
                $arParams['IBLOCK_SECTION'],
                array('SECTION_BUTTONS' => false)
			);
            
            if($APPLICATION->GetShowIncludeAreas())
                $this->AddIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));
        }
    }
	
    $iCurrentElementNumber = 0;
	while ($rsElement = $rsElements->GetNextElement())
	{          
        if ($iCurrentElementNumber >= $arParams["IBLOCK_ELEMENTS_COUNT"] && $arParams["IBLOCK_ELEMENTS_COUNT"] > 0)
            break;
        
		$arElement = $rsElement->GetFields();
		$arElement['PROPERTIES'] = $rsElement->GetProperties();
		
		if (!empty($arElement['DETAIL_PICTURE']) && $arParams['USE_DETAIL_PICTURE'] == "Y")
		{
			$arElement['PICTURE'] = CFile::ResizeImageGet(
				$arElement['DETAIL_PICTURE'],
				array('width' => $arParams['PICTURE_WIDTH'], 'height' => $arParams['PICTURE_HEIGHT']),
				BX_RESIZE_PROPORTIONAL_ALT
			);
			
			$arElement['PICTURE'] = $arElement['PICTURE']['src'];
		}
		else if (!empty($arElement['PREVIEW_PICTURE'])  && $arParams['USE_PREVIEW_PICTURE'] == "Y")
		{
			$arElement['PICTURE'] = CFile::ResizeImageGet(
				$arElement['PREVIEW_PICTURE'],
				array('width' => $arParams['PICTURE_WIDTH'], 'height' => $arParams['PICTURE_HEIGHT']),
				BX_RESIZE_PROPORTIONAL_ALT
			);
			
			$arElement['PICTURE'] = $arElement['PICTURE']['src'];
		}
		else if (!empty($arParams['NO_PICTURE_PATH']))
		{
			$arElement['PICTURE'] = $arParams['NO_PICTURE_PATH'];
		}
		else
		{
			$arElement['PICTURE'] = null;
		}
		
        $arButtons = CIBlock::GetPanelButtons(
			$arElement["IBLOCK_ID"],
			$arElement["ID"],
			$arElement["SECTION_ID"],
			array("SECTION_BUTTONS"=>false, "SESSID"=>false, "CATALOG"=>true)
		);
		$arElement["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
		$arElement["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];
        
		$arResult['ELEMENTS'][] = $arElement;
        $iCurrentElementNumber++;
	}
?>
<?$this->IncludeComponentTemplate();?>