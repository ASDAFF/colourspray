<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?if(!CModule::IncludeModule("iblock")) die();?>	
<?
    function __getVars()
    {
        if (is_file(WIZARD_SERVICE_ABSOLUTE_PATH.'/temp.vars'))
            return unserialize(file_get_contents(WIZARD_SERVICE_ABSOLUTE_PATH.'/temp.vars'));
    }
    
    function __setVars($arVars)
    {
        return file_put_contents(WIZARD_SERVICE_ABSOLUTE_PATH.'/temp.vars', serialize($arVars));
    }
    
    function __clearVars()
    {
        if (is_file(WIZARD_SERVICE_ABSOLUTE_PATH.'/temp.vars'))
            unlink(WIZARD_SERVICE_ABSOLUTE_PATH.'/temp.vars');
    }

    function __importIBlockFile($sFileName, $sIBlockType, $sIBlockCode, $arExtendFields = array())
    {
        $sIBlockXMLFile = WIZARD_SERVICE_RELATIVE_PATH."/xml/".$sFileName;
        $sIBlockCode = $sIBlockCode.'_'.WIZARD_SITE_ID;
        
        $rsIBlock = CIBlock::GetList(array(), array("XML_ID" => $sIBlockCode, "TYPE" => $sIBlockType));
        $iIBlockID = false;
        
        if ($arIBlock = $rsIBlock->Fetch()) {
            $iIBlockID = $arIBlock["ID"];
            return $iIBlockID;
        }
        
        if ($iIBlockID == false)
        {
            $arPermissions = array(
    			"1" => "X",
    			"2" => "R"
    		);
            
            $dbGroup = CGroup::GetList($by = "", $order = "", array("STRING_ID" => "site_owners_group"));
            
            if($arGroup = $dbGroup->Fetch()) {
				if ($sFileName == 'offers.xml' || $sFileName == 'products.xml') {
					$arPermissions[$arGroup["ID"]] = 'X';
				} else {
					$arPermissions[$arGroup["ID"]] = 'W';
				}
        	};
            
            $iIBlockID = WizardServices::ImportIBlockFromXML(
        		$sIBlockXMLFile,
        		$sIBlockCode,
        		$sIBlockType,
        		WIZARD_SITE_ID,
        		$arPermissions
        	);
            
            $oIBlock = new CIBlock;
        	$arFields = Array(
        		"ACTIVE" => "Y",
        		"FIELDS" => array (
                    'IBLOCK_SECTION' => array ('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => ''),
                    'ACTIVE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'Y'),
                    'ACTIVE_FROM' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '=today'),
                    'ACTIVE_TO' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => ''),
                    'SORT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => ''),
                    'NAME' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => ''),
                    'PREVIEW_PICTURE' => array(
                        'IS_REQUIRED' => 'N',
                        'DEFAULT_VALUE' => array(
                            'FROM_DETAIL' => 'N',
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'DELETE_WITH_DETAIL' => 'N',
                            'UPDATE_WITH_DETAIL' => 'N'
                        )
                    ),
                    'PREVIEW_TEXT_TYPE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text'),
                    'PREVIEW_TEXT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => ''),
                    'DETAIL_PICTURE' => array(
                        'IS_REQUIRED' => 'N',
                        'DEFAULT_VALUE' => array(
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95
                        )
                    ),
                    'DETAIL_TEXT_TYPE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text'),
                    'DETAIL_TEXT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => ''),
                    'XML_ID' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => ''),
                    'CODE' => array(
                        'IS_REQUIRED' => 'Y',
                        'DEFAULT_VALUE' => array(
                            'UNIQUE' => 'Y',
                            'TRANSLITERATION' => 'Y',
                            'TRANS_LEN' => 100,
                            'TRANS_CASE' => 'L',
                            'TRANS_SPACE' => '_',
                            'TRANS_OTHER' => '_',
                            'TRANS_EAT' => 'Y',
                            'USE_GOOGLE' => 'Y'
                        ) 
                    ),
                    'TAGS' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => ''),
                    'SECTION_NAME' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => ''),
                    'SECTION_PICTURE' => array(
                        'IS_REQUIRED' => 'N',
                        'DEFAULT_VALUE' => array(
                            'FROM_DETAIL' => 'N',
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'DELETE_WITH_DETAIL' => 'N',
                            'UPDATE_WITH_DETAIL' => 'N'
                        )
                    ),
                    'SECTION_DESCRIPTION_TYPE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text'),
                    'SECTION_DESCRIPTION' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => ''),
                    'SECTION_DETAIL_PICTURE' => array(
                        'IS_REQUIRED' => 'N',
                        'DEFAULT_VALUE' => array(
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95
                        )
                    ),
                    'SECTION_XML_ID' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => ''),
                    'SECTION_CODE' => array(
                        'IS_REQUIRED' => 'Y',
                        'DEFAULT_VALUE' => array(
                            'UNIQUE' => 'Y',
                            'TRANSLITERATION' => 'Y',
                            'TRANS_LEN' => 100,
                            'TRANS_CASE' => 'L',
                            'TRANS_SPACE' => '_',
                            'TRANS_OTHER' => '_',
                            'TRANS_EAT' => 'Y',
                            'USE_GOOGLE' => 'N'
                        )
                    )
                ),
        		"CODE" => $sIBlockCode, 
        		"XML_ID" => $sIBlockCode		
        	);
			
			$arFields = array_merge($arFields, $arExtendFields);
            
            $oIBlock->Update($iIBlockID, $arFields);
            return $iIBlockID;
        }
    }
?>