<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('contacts.xml', 'content', 'unimagazinlite_contacts');
    
    $arVars = __getVars();
    $arVars['MACROS']['CONTACTS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['CONTACTS_IBLOCK_TYPE'] = 'content';
    __setVars($arVars);
?>