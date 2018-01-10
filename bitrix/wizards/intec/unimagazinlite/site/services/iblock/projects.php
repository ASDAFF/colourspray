<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('projects.xml', 'content', 'unimagazinlite_projects');
    
    $arVars = __getVars();
    $arVars['MACROS']['PROJECTS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['PROJECTS_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>