<?
    if (!empty($arParams['PICTURES']) && is_array($arParams['PICTURES']))
    {
        $arResult['ITEMS'] = array();
        
        foreach ($arParams['PICTURES'] as $iPicture)
        {
            $arPicture = CFile::ResizeImageGet(
                $iPicture,
                array('width' => '800', 'height' => '800'),
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT
            );
            
            if (!empty($arPicture['src']))
                $arResult['ITEMS'][] = $arPicture['src'];
        }
    }
?>