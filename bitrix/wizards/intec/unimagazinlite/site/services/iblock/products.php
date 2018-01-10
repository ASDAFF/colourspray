<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('products.xml', 'catalog', 'unimagazinlite_products');
    
    $arVars = __getVars();
    $arVars['MACROS']['CATALOG_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['CATALOG_IBLOCK_TYPE'] = 'catalog';
    __setVars($arVars);
?>