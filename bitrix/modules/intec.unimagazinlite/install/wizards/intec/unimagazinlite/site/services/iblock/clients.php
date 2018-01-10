<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('clients.xml', 'content', 'unimagazinlite_clients');
    
    $arVars = __getVars();
    $arVars['MACROS']['CLIENTS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['CLIENTS_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>