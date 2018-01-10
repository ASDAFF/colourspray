<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('offers.xml', 'catalog', 'unimagazinlite_offers');
    
    $arVars = __getVars();
    $arVars['MACROS']['OFFERS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['OFFERS_IBLOCK_TYPE'] = 'catalog';
    __setVars($arVars);
?>