<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('articles.xml', 'content', 'unimagazinlite_articles');
    
    $arVars = array();
    $arVars['MACROS'] = array();
    $arVars['MACROS']['ARTICLES_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['ARTICLES_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>