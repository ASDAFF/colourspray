<?
    include('.utils.php');
    $wizard = &$this->GetWizard();
    $iIBlockID = __importIBlockFile('banners.xml', 'content', 'unimagazinlite_banners');
    
    $arVars = __getVars();
    $arVars['MACROS']['BANNERS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['BANNERS_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>