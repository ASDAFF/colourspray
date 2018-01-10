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
        'PARAMETERS' => array(
            "IBLOCK_TYPE" => array(
    			"PARENT" => "BASE",
    			"NAME" => GetMessage("IBLOCK_TYPE"),
    			"TYPE" => "LIST",
    			"VALUES" => $arIBlockTypes,
    			"REFRESH" => "Y",
    		),
            "IBLOCK_ID" => array(
    			"PARENT" => "BASE",
    			"NAME" => GetMessage("IBLOCK_IBLOCK"),
    			"TYPE" => "LIST",
    			"ADDITIONAL_VALUES" => "Y",
    			"VALUES" => $arIBlocks,
    			"REFRESH" => "Y",
    		),
            "IBLOCK_ELEMENT_ID" => array(
                "PARENT" => "BASE",
                "NAME" => GetMessage("IBLOCK_ELEMENT"),
                "TYPE" => "STRING"
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
    )
?>