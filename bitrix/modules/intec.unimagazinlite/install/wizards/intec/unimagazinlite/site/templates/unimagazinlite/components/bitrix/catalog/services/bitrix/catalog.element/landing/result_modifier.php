<?
    $arData = array();
    
    /* Цена */
    $arData['PRICE'] = array();
    $arData['PRICE']['SHOW'] = false;
    $arData['PRICE']['VALUE'] = 0;
    $arData['PRICE']['FORMATTED'] = 0;
    
    if (!empty($arResult['PROPERTIES']['PRICE']['VALUE']))
    {
        $arData['PRICE']['SHOW'] = true;
        $arData['PRICE']['VALUE'] = $arResult['PROPERTIES']['PRICE']['VALUE'];
        $arData['PRICE']['FORMATTED'] = GetMessage('SERVICE_HEADER_PRICE_FROM').' '.
            $arResult['PROPERTIES']['PRICE']['VALUE'].' '.
            GetMessage('SERVICE_HEADER_PRICE_CURRENCY');
    }
    /** Цена **/
    
    /* Текст анонса */
    $arData['PREVIEW_TEXT'] = array();
    $arData['PREVIEW_TEXT']['SHOW'] = true;
    $arData['PREVIEW_TEXT']['VALUE'] = $arResult['PREVIEW_TEXT'];
    /** Текст анонса **/
    
    /* Изображение */
    $arData['IMAGE'] = array();
    $arData['IMAGE']['SHOW'] = false;
    $arData['IMAGE']['PATH'] = "";
    
    if (!empty($arResult['DETAIL_PICTURE']))
    {
        $arData['IMAGE']['SHOW'] = true;
        $arData['IMAGE']['PATH'] = CFile::ResizeImageGet(
            $arResult['DETAIL_PICTURE'],
            array('width' => 1000, 'height' => 300),
            BX_RESIZE_IMAGE_PROPORTIONAL_ALT
        );
        $arData['IMAGE']['PATH'] = $arData['IMAGE']['PATH']['src'];
    }
    else if (!empty($arResult['PREVIEW_PICTURE']))
    {
        $arData['IMAGE']['SHOW'] = true;
        $arData['IMAGE']['PATH'] = CFile::ResizeImageGet(
            $arResult['PREVIEW_PICTURE'],
            array('width' => 1000, 'height' => 300),
            BX_RESIZE_IMAGE_PROPORTIONAL_ALT
        );
        $arData['IMAGE']['PATH'] = $arData['IMAGE']['PATH']['src'];
    }
    /** Изображение **/
    
    /* Детальный текст */
    $arData['DETAIL_TEXT'] = array();
    $arData['DETAIL_TEXT']['SHOW'] = true;
    $arData['DETAIL_TEXT']['VALUE'] = $arResult['DETAIL_TEXT'];
    /** Детальный текст **/
    
    /* Специалист */
    $arData['SPECIALIST'] = array();
    $arData['SPECIALIST']['SHOW'] = false;
    $arData['SPECIALIST']['VALUE'] = null;
    
    if (!empty($arResult['PROPERTIES']['SPECIALIST']['VALUE']))
    {
        $dbSpecialist = CIBlockElement::GetByID($arResult['PROPERTIES']['SPECIALIST']['VALUE']);
        
        if ($arSpecialist = $dbSpecialist->Fetch())
        {
            $arData['SPECIALIST']['SHOW'] = true;
            $arData['SPECIALIST']['VALUE'] = $arSpecialist['ID'];
        }
        
        unset($arSpecialist, $dbSpecialist);
    }
    
    $arData['SPECIALIST']['ELEMENT'] = $arData['SPECIALIST']['SHOW'] && !empty($arResult['PROPERTIES']['SPECIALIST_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['SPECIALIST_ELEMENT']['VALUE_XML_ID'] : null;
    /** Специалист **/
    
    /* Документы */
    $arData['DOCUMENTS'] = array();
    $arData['DOCUMENTS']['SHOW'] = !empty($arResult['PROPERTIES']['DOCUMENTS']['VALUE']) ? true : false;
    $arData['DOCUMENTS']['VALUE'] = $arResult['PROPERTIES']['DOCUMENTS']['VALUE'];
    $arData['DOCUMENTS']['ELEMENT'] = $arData['DOCUMENTS']['SHOW'] && !empty($arResult['PROPERTIES']['DOCUMENTS_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['DOCUMENTS_ELEMENT']['VALUE_XML_ID'] : null;
    /** Документы **/
    
    /* Характеристики */
    $arData['CHARACTERISTICS'] = array();
    $arData['CHARACTERISTICS']['SHOW'] = !empty($arResult['PROPERTIES']['CHARACTERISTICS']['VALUE']) ? true : false;
    $arData['CHARACTERISTICS']['VALUE'] = $arResult['PROPERTIES']['CHARACTERISTICS']['VALUE'];
    $arData['CHARACTERISTICS']['ELEMENT'] = $arData['CHARACTERISTICS']['SHOW'] && !empty($arResult['PROPERTIES']['CHARACTERISTICS_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['CHARACTERISTICS_ELEMENT']['VALUE_XML_ID'] : null;
    /** Характеристики **/
    
    /* Контакт */
    $arData['CONTACT'] = array();
    $arData['CONTACT']['SHOW'] = false;
    $arData['CONTACT']['VALUE'] = null;
    
    if (!empty($arResult['PROPERTIES']['CONTACT']['VALUE']))
    {
        $dbContact = CIBlockElement::GetByID($arResult['PROPERTIES']['CONTACT']['VALUE']);
        
        if ($arContact = $dbContact->Fetch())
        {
            $arData['CONTACT']['SHOW'] = true;
            $arData['CONTACT']['VALUE'] = $arContact['ID'];
        }
        
        unset($arContact, $dbContact);
    }
    /** Контакт **/
    
    /* Галерея */
    $arData['GALLERY'] = array();
    $arData['GALLERY']['SHOW'] = !empty($arResult['PROPERTIES']['GALLERY']['VALUE']) ? true : false;
    $arData['GALLERY']['VALUE'] = $arResult['PROPERTIES']['GALLERY']['VALUE'];
    $arData['GALLERY']['ELEMENT'] = $arData['GALLERY']['SHOW'] && !empty($arResult['PROPERTIES']['GALLERY_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['GALLERY_ELEMENT']['VALUE_XML_ID'] : null;
    /** Галерея **/
    
    /* Проекты */
    $arData['PROJECTS'] = array();
    $arData['PROJECTS']['SHOW'] = !empty($arResult['PROPERTIES']['PROJECTS']['VALUE']) ? true : false;
    $arData['PROJECTS']['VALUE'] = $arResult['PROPERTIES']['PROJECTS']['VALUE'];
    $arData['PROJECTS']['ELEMENT'] = $arData['PROJECTS']['SHOW'] && !empty($arResult['PROPERTIES']['PROJECTS_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['PROJECTS_ELEMENT']['VALUE_XML_ID'] : null;
    /** Проекты **/
    
    /* Отзывы */
    $arData['REVIEWS'] = array();
    $arData['REVIEWS']['SHOW'] = !empty($arResult['PROPERTIES']['REVIEWS']['VALUE']) ? true : false;
    $arData['REVIEWS']['VALUE'] = $arResult['PROPERTIES']['REVIEWS']['VALUE'];
    $arData['REVIEWS']['ELEMENT'] = $arData['REVIEWS']['SHOW'] && !empty($arResult['PROPERTIES']['REVIEWS_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['REVIEWS_ELEMENT']['VALUE_XML_ID'] : null;
    /** Отзывы **/
    
    /* Сопутствующие услуги */
    $arData['SERVICES'] = array();
    $arData['SERVICES']['SHOW'] = !empty($arResult['PROPERTIES']['SERVICES']['VALUE']) ? true : false;
    $arData['SERVICES']['VALUE'] = $arResult['PROPERTIES']['SERVICES']['VALUE'];
    $arData['SERVICES']['ELEMENT'] = $arData['SERVICES']['SHOW'] && !empty($arResult['PROPERTIES']['SERVICES_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['SERVICES_ELEMENT']['VALUE_XML_ID'] : null;
    /** Сопутствующие услуги **/
    
    /* Видео */
    $arData['VIDEO'] = array();
    $arData['VIDEO']['SHOW'] = !empty($arResult['PROPERTIES']['VIDEO']['VALUE']) ? true : false;
    $arData['VIDEO']['VALUE'] = $arResult['PROPERTIES']['VIDEO']['VALUE'];
    /** Видео **/
    
    /* Как мы работаем */
    $arData['HOW_WE_WORK'] = array();
    $arData['HOW_WE_WORK']['SHOW'] = !empty($arResult['PROPERTIES']['HOW_WE_WORK']['VALUE']) ? true : false;
    $arData['HOW_WE_WORK']['VALUE'] = $arResult['PROPERTIES']['HOW_WE_WORK']['VALUE'];
    /** Как мы работаем **/
    
    /* Наши преимущества */
    $arData['OUR_ADVANTAGES'] = array();
    $arData['OUR_ADVANTAGES']['SHOW'] = !empty($arResult['PROPERTIES']['OUR_ADVANTAGES']['VALUE']) ? true : false;
    $arData['OUR_ADVANTAGES']['VALUE'] = $arResult['PROPERTIES']['OUR_ADVANTAGES']['VALUE'];
    /** Наши преимущества **/
    
    /* Наши клиенты */
    $arData['OUR_CLIENTS'] = array();
    $arData['OUR_CLIENTS']['SHOW'] = !empty($arResult['PROPERTIES']['OUR_CLIENTS']['VALUE']) ? true : false;
    $arData['OUR_CLIENTS']['VALUE'] = $arResult['PROPERTIES']['OUR_CLIENTS']['VALUE'];
    /** Наши клиенты **/
    
    /* Контакты */
    $arData['CONTACTS'] = array();
    $arData['CONTACTS']['SHOW'] = !empty($arResult['PROPERTIES']['CONTACTS']['VALUE']) ? true : false;
    $arData['CONTACTS']['VALUE'] = $arResult['PROPERTIES']['CONTACTS']['VALUE'];
    $arData['CONTACTS']['ELEMENT'] = $arData['CONTACTS']['SHOW'] && !empty($arResult['PROPERTIES']['CONTACTS_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['CONTACTS_ELEMENT']['VALUE_XML_ID'] : null;
    /** Контакты **/
	
	$arResult['DATA'] = $arData;
?>