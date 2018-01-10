<? 
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


if (CModule::IncludeModule('intec.startshop'))
{
	$arPricesTypes = array();
    $dbPricesTypes = CStartShopPrice::GetList(array('SORT' => 'ASC'));

    while ($arPriceType = $dbPricesTypes->Fetch())
        $arPricesTypes[$arPriceType['CODE']] = '['.$arPriceType['CODE'].'] '.$arPriceType['LANG'][LANGUAGE_ID]['NAME'];

    unset($dbPricesTypes, $arPriceType);
}

	$arTemplateParameters['PRICE_CODE'] = array(
        "PARENT" => "PRICES",
        "NAME" => GetMessage("IBLOCK_PRICE_CODE"),
        "TYPE" => "LIST",
        "MULTIPLE" => "Y",
        "VALUES" => $arPricesTypes
    );
	$arTemplateParameters['COMPARE_NAME'] = array(
        "NAME" => GetMessage("IBLOCK_COMPARE_NAME"),
		"TYPE" => "STRING",
		"DEFAULT" => "CATALOG_COMPARE_LIST"
    );
?>