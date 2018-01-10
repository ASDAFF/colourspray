<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('news.xml', 'content', 'unimagazinlite_news');
    
    $arVars = __getVars();
    $arVars['MACROS']['NEWS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['NEWS_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>