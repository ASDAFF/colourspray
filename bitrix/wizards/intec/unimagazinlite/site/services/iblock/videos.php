<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('videos.xml', 'content', 'unimagazinlite_videos');
    
    $arVars = __getVars();
    $arVars['MACROS']['VIDEOS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['VIDEOS_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>