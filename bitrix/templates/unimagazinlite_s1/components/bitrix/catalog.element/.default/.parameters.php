<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
 
$arCurrencies = array();

if (CModule::IncludeModule('intec.startshop'))
{
	$dbCurrencies = CStartShopCurrency::GetList();

	while ($arCurrency = $dbCurrencies->Fetch())
		$arCurrencies[$arCurrency['CODE']] = '['.$arCurrency['CODE'].'] ('.$arCurrency['SITE_ID'].') '.$arCurrency['NAME'];

	unset($dbCurrencies, $arCurrency);
}

$arTemplateParameters = array();
$arTemplateParameters['CURRENCY'] = array(
	'NAME' => GetMessage('CURRENCY'),
	'TYPE' => 'LIST',
	'VALUES' => $arCurrencies
);
?>