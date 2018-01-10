<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('categories_popular.xml', 'content', 'unimagazinlite_categories_popular');
    
    $arVars = __getVars();
    $arVars['MACROS']['CATEGORIES_POPULAR_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['CATEGORIES_POPULAR_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>