<?
    use Bitrix\Main\Loader;
    use Bitrix\Main\ModuleManager;
    use Bitrix\Iblock;
    use Bitrix\Currency;
    
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
        'GROUPS' => array(
            "SORT" => array(
                "NAME" => GetMessage('GROUPS_SORT')
            )
        ),
        'PARAMETERS' => array(
            "IBLOCK_TYPE" => array(
    			"PARENT" => "BASE",
    			"NAME" => GetMessage("IBLOCK_TYPE"),
    			"TYPE" => "LIST",
    			"VALUES" => $arIBlockTypes,
    			"REFRESH" => "Y",
    		),
            "PICTURE_WIDTH" => array(
                "PARENT" => "VISUAL",
                "NAME" => GetMessage("PICTURE_WIDTH"),
                "TYPE" => "STRING",
                "DEFAULT" => "200"
            ),
            "USE_DETAIL_PICTURE" => array(
                "PARENT" => "VISUAL",
                "NAME" => GetMessage("USE_DETAIL_PICTURE"),
                "TYPE" => "CHECKBOX",
                "DEFAULT" => "Y"
            ),
            "USE_PREVIEW_PICTURE" => array(
                "PARENT" => "VISUAL",
                "NAME" => GetMessage("USE_PREVIEW_PICTURE"),
                "TYPE" => "CHECKBOX",
                "DEFAULT" => "Y"
            ),
            "PICTURE_HEIGHT" => array(
                "PARENT" => "VISUAL",
                "NAME" => GetMessage("PICTURE_HEIGHT"),
                "TYPE" => "STRING",
                "DEFAULT" => "200"
            ),
            "NO_PICTURE_PATH" => array(
                "PARENT" => "VISUAL",
                "NAME" => GetMessage("NO_PICTURE_PATH"),
                "TYPE" => "STRING"
            )            
        )
    );
    
    if (!empty($arCurrentValues['IBLOCK_TYPE'])) {        
        $arComponentParameters['PARAMETERS']['IBLOCK_ID'] = array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_IBLOCK"),
			"TYPE" => "LIST",
			"ADDITIONAL_VALUES" => "Y",
			"VALUES" => $arIBlocks,
			"REFRESH" => "Y"
		);
        
        if (is_numeric($arCurrentValues['IBLOCK_ID'])) {
            $arElements = array();
            $arSections = array('' => GetMessage('LIST_NOT_SELECTED'));
            $arSortFields = array('ID' => GetMessage('IBLOCK_SORT_FIELD_ID'));
            $arSectionsCode = array('' => GetMessage('LIST_NOT_SELECTED'));
            $rsSections = CIBlockSection::GetList(array(), array(
                "IBLOCK_TYPE" => $arCurrentValues['IBLOCK_TYPE'],
                "IBLOCK_ID" => $arCurrentValues['IBLOCK_ID']
            ));
            
            while ($arSection = $rsSections->GetNext()) {
                $arSections[$arSection['ID']] = '['.$arSection['ID'].'] '.$arSection['NAME'];
                
                if (!empty($arSection['CODE']))
                    $arSectionsCode[$arSection['CODE']] = '['.$arSection['CODE'].'] '.$arSection['NAME'];
            }
                
            
            $arComponentParameters['PARAMETERS']['IBLOCK_SECTION'] = array(
    			"PARENT" => "BASE",
    			"NAME" => GetMessage("IBLOCK_SECTION"),
    			"TYPE" => "LIST",
    			"VALUES" => $arSections,
    			"REFRESH" => "Y"
    		);
            
            $arComponentParameters['PARAMETERS']['IBLOCK_SECTION_CODE'] = array(
    			"PARENT" => "BASE",
    			"NAME" => GetMessage("IBLOCK_SECTION_CODE"),
    			"TYPE" => "LIST",
    			"VALUES" => $arSectionsCode,
    			"REFRESH" => "Y"
    		);
            
            $arFilter = array(
                "IBLOCK_TYPE" => $arCurrentValues['IBLOCK_TYPE'],
                "IBLOCK_ID" => $arCurrentValues['IBLOCK_ID']
            );
            
            if (!empty($arCurrentValues['IBLOCK_SECTION']))
                $arFilter['SECTION_ID'] = $arCurrentValues['IBLOCK_SECTION'];
                
            if (!empty($arCurrentValues['IBLOCK_SECTION_CODE']))
                $arFilter['SECTION_CODE'] = $arCurrentValues['IBLOCK_SECTION_CODE'];
                
            if (!empty($arCurrentValues['FILTER']) && is_array($arCurrentValues['FILTER']))
                $arFilter = array_merge($arCurrentValues['FILTER'], $arFilter);
            
            $arComponentParameters['PARAMETERS']['IBLOCK_ELEMENTS_COUNT'] = array(
                "PARENT" => "BASE",
                "NAME" => GetMessage("IBLOCK_ELEMENTS_COUNT"),
                "TYPE" => "STRING",
                "DEFAULT" => "0"
            );
            
            $rsElements = CIBlockElement::GetList(array(), $arFilter);
            
            while ($arElement = $rsElements->GetNext())
                $arElements[$arElement['ID']] = '['.$arElement['ID'].'] '.$arElement['NAME'];
            
            $arComponentParameters['PARAMETERS']["IBLOCK_ELEMENTS_ID"] = array(
                "PARENT" => "BASE",
                "NAME" => GetMessage("IBLOCK_ELEMENTS"),
                "TYPE" => "LIST",
                "MULTIPLE" => "Y",
                "VALUES" => $arElements,
                "SIZE" => "10"
            );
            
            $rsSortFields = CIBlock::GetFields($arCurrentValues['IBLOCK_ID']);
            $arAllowedSortFields = array(
                "IBLOCK_SECTION",
                "ACTIVE_FROM",
                "ACTIVE_TO",
                "SORT",
                "NAME",
                "PREVIEW_TEXT",
                "DETAIL_TEXT",
                "XML_ID",
                "CODE",
                "TAGS"
            );
            
            foreach ($rsSortFields as $sKey => $arSortField)
                if (in_array($sKey, $arAllowedSortFields))
                    $arSortFields[$sKey] = '['.$sKey.'] '.$arSortField['NAME'];
                    
            $rsSortProperties = CIBlock::GetProperties($arCurrentValues['IBLOCK_ID']);
            
            while ($arSortProperty = $rsSortProperties->Fetch())
                $arSortFields['PROPERTY_'.$arSortProperty['CODE']] = '[PROPERTY_'.$arSortProperty['CODE'].'] '.$arSortProperty['NAME'];
            
            $arComponentParameters['PARAMETERS']['IBLOCK_SORT_FIELD'] = array(
                "PARENT" => "SORT",
                "NAME" => GetMessage('IBLOCK_SORT_FIELD'),
                "TYPE" => "LIST",
                "ADDITIONAL_VALUES" => "Y",
                "VALUES" => $arSortFields,
                "REFRESH" => "Y"
            );
            
            if (!empty($arCurrentValues['IBLOCK_SORT_FIELD']))
                $arComponentParameters['PARAMETERS']['IBLOCK_SORT_ORDER'] = array(
                    "PARENT" => "SORT",
                    "NAME" => GetMessage('IBLOCK_SORT_ORDER'),
                    "TYPE" => "LIST",
                    "VALUES" => array(
                        "asc" => GetMessage('IBLOCK_SORT_ORDER_ASC'),
                        "desc" => GetMessage('IBLOCK_SORT_ORDER_DESC')
                    )
                );
        }
    }
?>