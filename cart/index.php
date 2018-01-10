<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
global $options;
$APPLICATION->IncludeComponent(
	"intec:startshop.basket", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"CURRENCY" => "",
		"HEADER_CART" => "Корзина",
		"HEADER_ORDER" => "Оформление заказа",
		"HEADER_PAYMENT" => "Оплата",
		"ORDER_PROPERTIES" => array(
			0 => "INITIALS",
			1 => "EMAIL",
			2 => "ABOUT",
			3 => "PHONE",
		),
		"HEADER_COMPLETE" => "Заказ завершен",
		"ORDER_DISPLAY_PRODUCTS" => "Y",
		"COMPLETE_URI" => SITE_DIR."/personal/orders/?ORDER_ID=#ID#",
		"CFO_USE_FASTORDER" => "Y",
		"CFO_PROP_NAME" => "NAME",
		"CFO_PROP_PHONE" => "PHONE",
		"CFO_PROP_COMMENT" => "COMMENT",
		"EMPTY_URI" => "",
		"SET_HEADERS" => "Y",
		"SET_NAVIGATION" => "Y",
		"USE_ADAPTABILITY" => "Y",
		"DISPLAY_PRODUCT_IMAGES" => $options['ADAPTIV']['ACTIVE_VALUE'],
		"ORDER_EMAIL_FIELD" => "EMAIL",
		"URL_ORDER_CREATED" => SITE_DIR."personal/orders/?ORDER_ID=#ID#",
		"URL_ORDER_CREATED_TO_USER" => SITE_DIR."personal/orders/?ORDER_ID=#ID#",
	),
	false
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>