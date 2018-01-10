<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?if (!defined("WIZARD_SITE_ID") || !defined("WIZARD_SITE_DIR") || !defined("WIZARD_ABSOLUTE_PATH") || !defined('WIZARD_SITE_PATH') || !defined('LANGUAGE_ID')) die();?>
<?
    $wizard =& $this->GetWizard();
    $sPublicDirectory = WIZARD_ABSOLUTE_PATH."/site/public/".LANGUAGE_ID."/";

    function ___writeToAreasFile($path, $text)
    {    
    	$fd = @fopen($path, "wb");
    	if(!$fd)
    		return false;
    
    	if(false === fwrite($fd, $text))
    	{
    		fclose($fd);
    		return false;
    	}
    
    	fclose($fd);
    
    	if(defined("BX_FILE_PERMISSIONS"))
    		@chmod($path, BX_FILE_PERMISSIONS);
    }

    if(is_dir($sPublicDirectory))
    {
    	CopyDirFiles(
    		$sPublicDirectory,
    		WIZARD_SITE_PATH,
    		$rewrite = true,
    		$recursive = true,
    		$delete_after_copy = false
    	);
    }
    
    ___writeToAreasFile(WIZARD_SITE_PATH.'include/company_name.php', htmlspecialcharsbx($wizard->GetVar('siteName')));
    ___writeToAreasFile(WIZARD_SITE_PATH.'include/company_phone.php', htmlspecialcharsbx($wizard->GetVar('sitePhone')));
    
    $sContacts = '';
    $sContactsEmail = $wizard->GetVar('siteEmail');
    $sContactsAddress = $wizard->GetVar('siteAddress');
    
    if (!empty($sContactsEmail)) 
        $sContacts .= '<div>'."\r\n".'<span class="one_phone">'.GetMessage('WIZARD_SERVICES_MAIN_FILES_EMAIL').'</span>'."\r\n".'<span class="text_phone">'.htmlspecialcharsbx($sContactsEmail).'</span>'."\r\n".'</div>';
        
    if (!empty($sContactsAddress)) 
        $sContacts .= '<div>'."\r\n".'<span class="one_phone">'.GetMessage('WIZARD_SERVICES_MAIN_FILES_ADDRESS').'</span>'."\r\n".'<span class="text_phone">'.htmlspecialcharsbx($sContactsAddress).'</span>'."\r\n".'</div>';

    ___writeToAreasFile(WIZARD_SITE_PATH.'include/footer_contacts.php', $sContacts);
    
    WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH, Array("SITE_DIR" => WIZARD_SITE_DIR));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."_index.php", Array("SITE_DIR" => WIZARD_SITE_DIR));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/.section.php", array("SITE_DESCRIPTION" => htmlspecialcharsbx($wizard->GetVar("siteMetaDescription"))));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/.section.php", array("SITE_KEYWORDS" => htmlspecialcharsbx($wizard->GetVar("siteMetaKeywords"))));

    unset($sContacts, $sContactsEmail, $sContactsAddress);
?>