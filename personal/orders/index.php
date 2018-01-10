<?
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $APPLICATION->SetTitle("Личный кабинет");
    global $options;
?>
<?if ($USER->IsAuthorized()):?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:menu",
		"startshop.top.1",
		array(
			"ROOT_MENU_TYPE" => "personal",
			"MENU_CACHE_TYPE" => "N",
			"MENU_CACHE_TIME" => "3600",
			"MENU_CACHE_USE_GROUPS" => "Y",
			"MENU_CACHE_GET_VARS" => array(
			),
			"MAX_LEVEL" => "1",
			"CHILD_MENU_TYPE" => "personal",
			"USE_EXT" => "N",
			"DELAY" => "N",
			"ALLOW_MULTI_SELECT" => "N"
		),
		false
	);?>
<?endif;?>
<?$APPLICATION->IncludeComponent(
	"intec:startshop.orders", 
	".default", 
	array(
		"CURRENCY" => "",
		"LIST_PAGE_URL" => SITE_DIR."personal/orders/",
		"DETAIL_PAGE_URL" => SITE_DIR."personal/orders/?ORDER_ID=#ID#",
		"COMPONENT_TEMPLATE" => ".default",
		"DISPLAY_PROPERTIES" => array(
			0 => "INITIALS",
			1 => "EMAIL",
			2 => "ABOUT",
			3 => "PHONE",
		),
		"PAY_STATUSES" => array(
			0 => "ADDED",
			1 => "ADOPTED",
		),
		"AUTHORIZE_URL" => SITE_DIR."personal/",
		"NO_ORDER_URL" => SITE_DIR."personal/",
		"ORDERS_LIST_HEADER" => "Заказы",
		"ORDERS_DETAIL_HEADER" => "Заказ",
		"USE_ADAPTABILITY" => $options['ADAPTIV']['ACTIVE_VALUE'],
		"FILTER" => array("PROPERTY_SITE_ID" => SITE_ID)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>