<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arCurrencies = array();

if (CModule::IncludeModule('intec.startshop'))
{
	$arCurrencies = array('');
    $dbCurrencies = CStartShopCurrency::GetList();

    while ($arCurrency = $dbCurrencies->Fetch())
        $arCurrencies[$arCurrency['CODE']] = '['.$arCurrency['CODE'].'] '.$arCurrency['LANG'][LANGUAGE_ID]['NAME'];

    unset($dbCurrencies, $arCurrency);
	
	$arPricesTypes = array();
    $dbPricesTypes = CStartShopPrice::GetList(array('SORT' => 'ASC'));

    while ($arPriceType = $dbPricesTypes->Fetch())
        $arPricesTypes[$arPriceType['CODE']] = '['.$arPriceType['CODE'].'] '.$arPriceType['LANG'][LANGUAGE_ID]['NAME'];

    unset($dbPricesTypes, $arPriceType);
}

$arTemplateParameters = array();
$arTemplateParameters['CURRENCY'] = array(
	'NAME' => GetMessage('CURRENCY'),
	'TYPE' => 'LIST',
	'VALUES' => $arCurrencies
);

$arTemplateParameters['DISPLAY_COMPARE'] = array(
    'PARENT' => 'COMPARE',
    'NAME' => GetMessage('DISPLAY_COMPARE'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);

$arTemplateParameters['COMPARE_PATH'] = array(
    'PARENT' => 'COMPARE',
    'NAME' => GetMessage('COMPARE_PATH'),
    'TYPE' => 'STRING'
);

$arTemplateParameters['COMPARE_NAME'] = array(
    'PARENT' => 'COMPARE',
    'NAME' => GetMessage('COMPARE_NAME'),
    'TYPE' => 'STRING'
);

$arTemplateParameters['PRICE_CODE'] = array(
	"PARENT" => "PRICES",
	"NAME" => GetMessage('PRICE_CODE'),
	"TYPE" => "LIST",
	"MULTIPLE" => "Y",
	"VALUES" => $arPricesTypes
);
?>