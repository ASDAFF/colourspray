<?if (!defined('B_PROLOG_INCLUDED') && B_PROLOG_INCLUDED !== true) die();?>
<?
    $arTemplateParameters = array(
        'AUTO_SLIDE' => array(
            'NAME' => GetMessage('SLIDER_AUTO_SLIDE'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'N'
        ),
        'AUTO_SLIDE_TIME' => array(
            'NAME' => GetMessage('SLIDER_AUTO_SLIDE_TIME'),
            'TYPE' => 'STRING',
            'DEFAULT' => '5000'
        )
    );
?>