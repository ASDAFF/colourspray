<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?if(CModule::IncludeModule("intec.unimagazinlite")){
	UniMagazinLite::InitProtection();
	UniMagazinLite::ShowInclude(SITE_ID);
}
$options = UniMagazinLite::getOptionsValue(SITE_ID);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.list", 
	"mobile_header", 
	array(
		"IBLOCK_TYPE" => $_REQUEST['IBLOCK_TYPE'],
		"IBLOCK_ID" => $_REQUEST['IBLOCK_ID'],
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"DETAIL_URL" => "",
		"COMPARE_URL" => SITE_DIR."catalog/compare.php",
		"NAME" => $_REQUEST['COMPARE_NAME'],
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id"
	),
	false
);?>