<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
    $arResult = array();
    
    $arDefaultParams = array(
        "USE_DETAIL_PICTURE" => "Y",
        "USE_PREVIEW_PICTURE" => "Y",
        "PICTURE_WIDTH" => "200",
        "PICTURE_HEIGHT" => "200",
    );
    
    $arParams = array_merge($arDefaultParams, $arParams);

    if (is_numeric($arParams['IBLOCK_ELEMENT_ID']))
    {
        if (!empty($arParams['IBLOCK_TYPE']) && is_numeric($arParams['IBLOCK_ID'])) {
            $rsElement = CIBlockElement::GetList(
                array(), 
                array(
                    "ID" => $arParams['IBLOCK_ELEMENT_ID'],
                    "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
                    "IBLOCK_ID" => $arParams['IBLOCK_ID'],
                    "ACTIVE" => "Y"
                )
            );
        } else {
            $rsElement = CIBlockElement::GetList(
                array(),
                array(
                    "ID" => $arParams['IBLOCK_ELEMENT_ID'],
                    "ACTIVE" => "Y"
                )
            );
        }
        
        if ($rsElement = $rsElement->GetNextElement())
        {
            $arResult = $rsElement->GetFields();
            $arResult['PROPERTIES'] = $rsElement->GetProperties();
            
            if (!empty($arResult['DETAIL_PICTURE']) && $arParams['USE_DETAIL_PICTURE'] == "Y")
            {
                $arResult['PICTURE'] = CFile::ResizeImageGet(
                    $arResult['DETAIL_PICTURE'],
                    array('width' => $arParams['PICTURE_WIDTH'], 'height' => $arParams['PICTURE_HEIGHT']),
                    BX_RESIZE_PROPORTIONAL_ALT
                );
                
                $arResult['PICTURE'] = $arResult['PICTURE']['src'];
            }
            else if (!empty($arResult['PREVIEW_PICTURE'])  && $arParams['USE_PREVIEW_PICTURE'] == "Y")
            {
                $arResult['PICTURE'] = CFile::ResizeImageGet(
                    $arResult['PREVIEW_PICTURE'],
                    array('width' => $arParams['PICTURE_WIDTH'], 'height' => $arParams['PICTURE_HEIGHT']),
                    BX_RESIZE_PROPORTIONAL_ALT
                );
                
                $arResult['PICTURE'] = $arResult['PICTURE']['src'];
            }
            else if (!empty($arParams['NO_IMAGE_PATH']))
            {
                $arResult['PICTURE'] = $arParams['NO_IMAGE_PATH'];
            }
            else
            {
                $arResult['PICTURE'] = null;
            }
        }
    }
?>
<?$this->IncludeComponentTemplate();?>