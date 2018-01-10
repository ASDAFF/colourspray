<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('jobs.xml', 'content', 'unimagazinlite_jobs');
    
    $arVars = __getVars();
    $arVars['MACROS']['JOBS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['JOBS_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>