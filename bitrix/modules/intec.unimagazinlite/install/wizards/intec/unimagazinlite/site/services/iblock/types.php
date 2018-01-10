<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?if(!CModule::IncludeModule("iblock")) die();?>
<?	
    $arTypes = array(
    	array(
    		"ID" => "content",
    		"SECTIONS" => "Y",
    		"IN_RSS" => "N",
    		"SORT" => 100,
    		"LANG" => array(),
    	),	
    	array(
    		"ID" => "catalog",
    		"SECTIONS" => "Y",
    		"IN_RSS" => "N",
    		"SORT" => 200,
    		"LANG" => array(),
    	),
    	array(
    		"ID" => "reviews",
    		"SECTIONS" => "Y",
    		"IN_RSS" => "N",
    		"SORT" => 300,
    		"LANG" => array(),
    	),
        array(
    		"ID" => "feedback",
    		"SECTIONS" => "Y",
    		"IN_RSS" => "N",
    		"SORT" => 400,
    		"LANG" => array(),
    	)
    );

    $arLanguages = Array();
    $rsLanguage = CLanguage::GetList($by, $order, array());
    while($arLanguage = $rsLanguage->Fetch())
    	$arLanguages[] = $arLanguage["LID"];

    $oIBlockType = new CIBlockType;
    foreach($arTypes as $arType)
    {
    	$dbType = CIBlockType::GetList(Array(),Array("=ID" => $arType["ID"]));
    	if($dbType->Fetch())
    		continue;
    
    	foreach($arLanguages as $languageID)
    	{
    		WizardServices::IncludeServiceLang("types.php", $languageID);
    
    		$sCode = strtoupper($arType["ID"]);
    		$arType["LANG"][$languageID]["NAME"] = GetMessage($sCode."_TYPE_NAME");
    		$arType["LANG"][$languageID]["ELEMENT_NAME"] = GetMessage($sCode."_ELEMENT_NAME");
    
    		if ($arType["SECTIONS"] == "Y")
    			$arType["LANG"][$languageID]["SECTION_NAME"] = GetMessage($sCode."_SECTION_NAME");
    	}
    
    	$oIBlockType->Add($arType);
    }

    COption::SetOptionString('iblock','combined_list_mode','Y');
?>