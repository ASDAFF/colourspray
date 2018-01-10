<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?if (!defined("WIZARD_TEMPLATE_ID")) die();?>
<?
    $sTemplateDirectory = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".WIZARD_TEMPLATE_ID.'_'.WIZARD_SITE_ID;
    $sTemplateWizardDirectory = $_SERVER["DOCUMENT_ROOT"].WizardServices::GetTemplatesPath(WIZARD_RELATIVE_PATH."/site")."/".WIZARD_TEMPLATE_ID;
    
    CopyDirFiles(
    	$sTemplateWizardDirectory,
    	$sTemplateDirectory,
    	$rewrite = true,
    	$recursive = true, 
    	$delete_after_copy = false,
    	$exclude = ""
    );
    
    $obSite = CSite::GetList($by = "def", $order = "desc", array(
        "LID" => WIZARD_SITE_ID
    ));
    
    if ($arSite = $obSite->Fetch())
    {
    	$arTemplates = Array();
    	$bFound = false;
    	$bFoundEmpty = false;
    	$obTemplate = CSite::GetTemplateList($arSite["LID"]);
        
    	while($arTemplate = $obTemplate->Fetch())
    	{
    		if(!$bFound && strlen(trim($arTemplate["CONDITION"]))<=0)
    		{
    			$arTemplate["TEMPLATE"] = WIZARD_TEMPLATE_ID.'_'.WIZARD_SITE_ID;
    			$bFound = true;
    		}
    		if($arTemplate["TEMPLATE"] == "empty")
    		{
    			$bFoundEmpty = true;
    			continue;
    		}
    		$arTemplates[]= $arTemplate;
    	}
    
    	if (!$bFound)
    		$arTemplates[]= Array("CONDITION" => "", "SORT" => 150, "TEMPLATE" => WIZARD_TEMPLATE_ID.'_'.WIZARD_SITE_ID);
    
    	$arFields = Array(
    		"TEMPLATE" => $arTemplates,
    		"NAME" => $arSite["NAME"],
    	);
    
    	$obSite = new CSite();
    	$obSite->Update($arSite["LID"], $arFields);
    }
    
    WizardServices::ReplaceMacrosRecursive($sTemplateDirectory, Array("SITE_DIR" => WIZARD_SITE_DIR));
?>