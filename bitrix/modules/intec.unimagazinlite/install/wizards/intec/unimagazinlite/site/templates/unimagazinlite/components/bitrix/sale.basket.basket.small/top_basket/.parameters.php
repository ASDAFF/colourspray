<?
    $arTemplateParameters = array();
    $arTemplateParameters['SHOW_CALL'] = array(
        'NAME' => GetMessage('SHOW_CALL'),
        'TYPE' => 'checkbox',
        'DEFAULT' => 'Y'
    );
    $arTemplateParameters['TYPE_BASKET'] = array(
        'NAME' => GetMessage('TYPE_BASKET'),
        'TYPE' => 'list',
        'VALUES' => array(
            'top' => GetMessage('TYPE_BASKET_TOP'),
            'header' => GetMessage('TYPE_BASKET_HEADER'),
            'fly' => GetMessage('TYPE_BASKET_FLY')
        ),
        'ADDITIONAL_VALUES' => 'Y',
        'DEFAULT' => 'top'
    );
?>