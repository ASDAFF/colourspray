<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('shares.xml', 'content', 'unimagazinlite_shares');
    
    $arVars = __getVars();
    $arVars['MACROS']['SHARES_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['SHARES_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>