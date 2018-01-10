<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('faq.xml', 'content', 'unimagazinlite_faq');
    
    $arVars = __getVars();
    $arVars['MACROS']['FAQ_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['FAQ_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>