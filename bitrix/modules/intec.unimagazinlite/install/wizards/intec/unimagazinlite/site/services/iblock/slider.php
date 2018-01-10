<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('slider.xml', 'content', 'unimagazinlite_slider');
    
    $arVars = __getVars();
    $arVars['MACROS']['SLIDER_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['SLIDER_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>