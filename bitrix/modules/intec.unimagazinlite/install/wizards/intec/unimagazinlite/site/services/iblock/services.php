<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('services.xml', 'catalog', 'unimagazinlite_services');
    
    $arVars = __getVars();
    $arVars['MACROS']['SERVICES_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['SERVICES_IBLOCK_TYPE'] = 'catalog';
    __setVars($arVars);
?>