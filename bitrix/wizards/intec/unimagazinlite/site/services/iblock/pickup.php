<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('pickup.xml', 'content', 'unimagazinlite_pickup');
    
    $arVars = __getVars();
    $arVars['MACROS']['PICKUP_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['PICKUP_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>