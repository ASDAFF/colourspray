<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?if (!CModule::IncludeModule('intec.unimagazinlite')) return;?>
<?    
	UniMagazinLite::InitProtection();
    $wizard =& $this->GetWizard();
    $themeID = $wizard->GetVar('themeID');
    
    if (!empty($themeID)) {
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'COLOR_THEME', $themeID, true);
    } else {
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'COLOR_THEME', 'BLUE', true);
    }
?>