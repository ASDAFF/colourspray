<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('reviews.xml', 'reviews', 'unimagazinlite_reviews');
    
    $arVars = __getVars();
    $arVars['MACROS']['REVIEWS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['REVIEWS_IBLOCK_TYPE'] = 'reviews';
    __setVars($arVars);
?>