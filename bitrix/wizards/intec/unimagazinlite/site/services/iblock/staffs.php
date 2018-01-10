<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('staffs.xml', 'content', 'unimagazinlite_staffs');
    
    $arVars = __getVars();
    $arVars['MACROS']['STAFFS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['STAFFS_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>