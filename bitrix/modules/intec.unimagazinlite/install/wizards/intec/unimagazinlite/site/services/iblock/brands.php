<?
    include('.utils.php');
    $wizard = &$this->GetWizard();
    $iIBlockID = __importIBlockFile('brands.xml', 'content', 'unimagazinlite_brands');
    
    $arVars = __getVars();
    $arVars['MACROS']['BRANDS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['BRANDS_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>