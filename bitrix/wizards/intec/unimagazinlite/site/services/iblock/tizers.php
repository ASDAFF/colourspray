<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('tizers.xml', 'content', 'unimagazinlite_tizers');
    
    $arVars = __getVars();
    $arVars['MACROS']['TIZERS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['TIZERS_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>