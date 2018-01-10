<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('characteristics.xml', 'content', 'unimagazinlite_characteristics');
    
    $arVars = __getVars();
    $arVars['MACROS']['CHARACTERISTICS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['CHARACTERISTICS_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>