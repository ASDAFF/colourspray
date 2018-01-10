<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
if ( empty($_REQUEST['action']) && ($_REQUEST['action'] !== 'addOneBuyClick' || $_REQUEST['action'] !== 'fastOrder') ) 
	$APPLICATION->ShowAjaxHead();?>
<?if(SITE_CHARSET=="windows-1251"){
	$_REQUEST["PRODUCT_PRICE_PRINT"]=iconv("UTF-8","windows-1251",$_REQUEST["PRODUCT_PRICE_PRINT"]);
	$_REQUEST["PRODUCT_NAME"]=iconv("UTF-8","windows-1251",$_REQUEST["PRODUCT_NAME"]);
	$_REQUEST["USER_NAME"]=iconv("UTF-8","windows-1251",$_REQUEST["USER_NAME"]);
	$_REQUEST["USER_PHONE"]=iconv("UTF-8","windows-1251",$_REQUEST["USER_PHONE"]);
	$_REQUEST["USER_COMMENT"]=iconv("UTF-8","windows-1251",$_REQUEST["USER_COMMENT"]);
}?>
<?if ($_REQUEST["ACTION"] == 'CREATE_FAST_ORDER') {
	$tmpComp = 'fastOrder';
} else $tmpComp = '';
?>
<?$APPLICATION->IncludeComponent("intec:oneclickbuy", $tmpComp, array(
		'PROP_NAME' => $_REQUEST["PROP_NAME"],
		'PROP_PHONE' => $_REQUEST["PROP_PHONE"],
		'PROP_COMMENT' => $_REQUEST["PROP_COMMENT"],
		'USER_NAME' => $_REQUEST["USER_NAME"],
		'USER_PHONE' => $_REQUEST["USER_PHONE"],
		'USER_COMMENT' => $_REQUEST["USER_COMMENT"],
		'PRODUCT_ID' => $_REQUEST["PRODUCT_ID"],
		'PRODUCT_NAME' => $_REQUEST["PRODUCT_NAME"],
		'PRODUCT_QUANTITY' => $_REQUEST["PRODUCT_QUANTITY"],
		'PRODUCT_PRICE' => $_REQUEST["PRODUCT_PRICE"],
		'PRODUCT_CURRENCY' => $_REQUEST["PRODUCT_CURRENCY"],
		"IMAGE" => $_REQUEST["IMAGE"],
		'PRODUCT_PRICE_PRINT' => $_REQUEST["PRODUCT_PRICE_PRINT"],
		'ACTION' => $_REQUEST["ACTION"]
	),
	false,
	array('HIDE_ICONS' => 'Y')
);?> 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>