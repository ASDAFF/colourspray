<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule("iblock"))
	return;
    
$arCurrencies = array();

if (CModule::IncludeModule('intec.startshop'))
{
	$dbCurrencies = CStartShopCurrency::GetList();

	while ($arCurrency = $dbCurrencies->Fetch())
		$arCurrencies[$arCurrency['CODE']] = '['.$arCurrency['CODE'].'] ('.$arCurrency['SITE_ID'].') '.$arCurrency['NAME'];

	unset($dbCurrencies, $arCurrency);
}
    
$arTemplateParameters = array(
	"DATE_PRODUCT_DAY" => Array(
		"NAME" => GetMessage("DATE_PRODUCT_DAY"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"TEXT_PRODUCT_DAY" => Array(
		"NAME" => GetMessage("TEXT_PRODUCT_DAY"),
		"TYPE" => "TEXT",
		"DEFAULT" => GetMessage("TEXT_PRODUCT_DAY_DEFAULT"),
	),
	"HREF_TO_DETAIL" => Array(
		"NAME" => GetMessage("HREF_TO_DETAIL"),
		"TYPE" => "TEXT",
		"DEFAULT" => SITE_DIR."product_day/",
	)
);

$arTemplateParameters['CURRENCY'] = array(
	'NAME' => GetMessage('CURRENCY'),
	'TYPE' => 'LIST',
	'VALUES' => $arCurrencies
);
?>