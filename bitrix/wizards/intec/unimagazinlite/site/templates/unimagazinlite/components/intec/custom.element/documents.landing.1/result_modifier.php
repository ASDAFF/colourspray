<?
    if (!empty($arParams['FILES']) && is_array($arParams['FILES']))
    {
        if (count($arParams['FILES']) > 1)
        {
            $dbDocuments = CFile::GetList(array(), array('@ID' => implode(',', $arParams['FILES'])));
        }
        else
        {
            reset($arParams['FILES']);
            $dbDocuments = $dbDocuments = CFile::GetList(array(), array('ID' => current($arParams['FILES'])));
        }
        
        $arResult['ITEMS'] = array();
        
        while ($arDocument = $dbDocuments->Fetch())
        {
            $arItem = array();
            $arItem = $arDocument;
            $arItem['PATH'] = CFile::GetPath($arDocument['ID']);
            $arResult['ITEMS'][] = $arItem;
        }
        
        unset($dbDocuments, $arDocument, $arItem);
    }
?>