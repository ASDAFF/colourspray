<?php
    IncludeModuleLangFile(__FILE__);

    global $APPLICATION;
    include('info.php');
        
    CModule::IncludeModule($MODULE_ID);
	$MODULE_CLASS::InitProtection();
    $sRights = $APPLICATION->GetGroupRight($MODULE_ID);
    
    if ($sRights >= "R") {
        $bApply = !empty($_REQUEST['Apply']);
        $bReset = !empty($_REQUEST['Reset']);
        
        $arSites = array();
        $dbSites = CSite::GetList($by = 'id', $sort = 'asc', array('ACTIVE' => 'Y'));
        
        while ($arSite = $dbSites->GetNext())
            $arSites[$arSite['ID']] = $arSite;
        
        if ($REQUEST_METHOD == 'POST' && check_bitrix_sessid() && ($bApply || $bReset)) {
            if ($bApply) {
                foreach ($arSites as $sKey => $arSite) {
                    $arOptions = $MODULE_CLASS::getOptionsValue($sKey);
                    foreach ($arOptions as $sOptionKey => $arOption)
                        $MODULE_CLASS::AdmSettingsSaveOption_EX($sOptionKey, $arOption, $sKey);                  
                }
                
                CAdminMessage::ShowNote(GetMessage('OPTIONS_MESSAGES_NOTES_APPLY'));
            }
            
            if ($bReset) {
                $MODULE_CLASS::resetOptionsValue();
                CAdminMessage::ShowNote(GetMessage('OPTIONS_MESSAGES_NOTES_RESET'));
            }
            
            if ($MODULE_CLASS::IsCompositeEnabled()) {
                $obCache = new CPHPCache();
                $obCache->CleanDir(false, 'html_pages');
                $MODULE_CLASS::EnableComposite();        
            }
        }
        
        $arTabs = array();
        
        foreach ($arSites as $arSite) {
            $arSiteMacros = array();
            foreach ($arSite as $sKey => $sSiteField)
                $arSiteMacros['#'.$sKey.'#'] = $sSiteField;
                
            $arTabs[] = array(
                'DIV' => $arSite['ID'],
                'TAB' => GetMessage('OPTIONS_TAB_NAME', $arSiteMacros),
                'ICON' => 'settings',
                'TITLE' => GetMessage('OPTIONS_TAB_TITLE', $arSiteMacros)
            );
            
            unset($arSiteMacros, $sKey, $sSiteField, $arSite);
        }
        
        ?><form method="POST"><?
        echo bitrix_sessid_post();
        $oTabControl = new CAdminTabControl("SiteSettings", $arTabs);
        $oTabControl->Begin();
        
        foreach ($arSites as $sKey => $arSite) {
            $oTabControl->BeginNextTab();
            
            $arOptions = $MODULE_CLASS::getOptionsValue($sKey);
            
            ?><tr><td><table class="adm-detail-content-table edit-table"><?
            foreach ($arOptions as $sOptionKey => $arOption)
                $MODULE_CLASS::AdmSettingsDrawRow_EX($sOptionKey, $arOption, $sKey);
            ?></table></td></tr><?    
            unset($arOptions, $arOption);
        }
        
        $oTabControl->Buttons();
        
        ?>
            <input type="submit" class="adm-btn-save" name="Apply" value="<?=GetMessage('OPTIONS_BUTTONS_APPLY_NAME')?>" />
            <input type="submit" name="Reset" value="<?=GetMessage('OPTIONS_BUTTONS_DEFAULT_NAME')?>" />
        <?
        
        $oTabControl->End();
        ?></form><?
    }
?>