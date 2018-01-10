<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?if (!CModule::IncludeModule('intec.startshop')) return;?>
<?
    global $APPLICATION;
	
	if(CModule::IncludeModule("intec.unimagazinlite")) {
		UniMagazinLite::InitProtection();
		UniMagazinLite::ShowInclude(SITE_ID);
		$options = UniMagazinLite::getOptionsValue(SITE_ID);
	}
    
	
	function drawBasket() {
		global $options;
		global $APPLICATION;
		
        $APPLICATION->IncludeComponent(
        	"intec:buttons.min.updater.lite", 
        	".default", 
        	array(
				"BASKET_ADD_MASK" => ".addToBasket#ID#",
        		"BASKET_ADDED_MASK" => ".addedToBasket#ID#",
        		"BASKET_ADD_SELECTOR" => ".addToBasket",
        		"BASKET_ADDED_SELECTOR" => ".addedToBasket"
        	),
        	$component
        );
		
		if ($options['TYPE_BASKET']['ACTIVE_VALUE'] == 'none') die();
		
		if ($options['TYPE_BASKET']['ACTIVE_VALUE'] == 'fly') {
		
			$APPLICATION->IncludeComponent(
				"intec:startshop.basket.basket.small", 
				'.flying', 
				array(
					"CART_URI" => SITE_DIR."cart/",
					"COMPONENT_TEMPLATE" => '.flying',
					"DISPLAY_GO_BUY" => "Y",
					"CURRENCY" => "RUB",
					"ORDER_URI" => SITE_DIR."cart/?action=order",
					"REQUEST_VARIABLE_ACTION" => "action",
					"REQUEST_VARIABLE_ITEM" => "item",
					"REQUEST_VARIABLE_QUANTITY" => "quantity",
					"USE_BUTTON_BUY" => "Y",
					"URL_BASKET" => SITE_DIR."cart/",
					"URL_ORDER" => SITE_DIR."cart/?action=order",
					"CFO_USE_FASTORDER" => $_REQUEST["CFO_USE_FASTORDER"],
					"CFO_PROP_NAME" => $_REQUEST["CFO_PROP_NAME"],
					"CFO_PROP_PHONE" => $_REQUEST["CFO_PROP_PHONE"],
					"CFO_PROP_COMMENT" => $_REQUEST["CFO_PROP_COMMENT"]
				),
				$component
			);
		} else {
			$APPLICATION->IncludeComponent(
				"intec:startshop.basket.basket.small", 
				'.default', 
				array(
					"DISPLAY_COUNT" => "Y",
					"DISPLAY_COUNT_IF_EMPTY" => "N",
					"DISPLAY_TOTAL" => "Y",
					"CURRENCY" => "rub",
					"CART_URI" => SITE_DIR."cart/",
					"COMPONENT_TEMPLATE" => ".default",
					"REQUEST_VARIABLE_ACTION" => "action",
					"REQUEST_VARIABLE_ITEM" => "item",
					"REQUEST_VARIABLE_QUANTITY" => "quantity",
					"USE_COUNT" => "N",
					"USE_COUNT_IF_EMPTY" => "N",
					"USE_SUM" => "Y",
					"URL_BASKET" => SITE_DIR."cart/"
				),
				$component
			);
		}
		
		die();
	}
	
	if (!CStartShopBasket::InBasket($_REQUEST['CatalogBasketItem'], SITE_ID) || $_REQUEST['CatalogBasketAction']=='Delete' || $_REQUEST['CatalogBasketAction']=='SetQuantity') {
		$bBasketActionComplete = (bool)CStartShopBasket::HandleRequestActions(
			$_REQUEST['CatalogBasketAction'],
			$_REQUEST['CatalogBasketItem'],
			$_REQUEST['CatalogBasketQuantity'],
			$_REQUEST['CatalogBasketPrice'],
			SITE_ID,
			array(
				'Add' => 'Add',
				'Delete' => 'Delete',
				'SetQuantity' => 'SetQuantity'
			)
		);
	}
	
	drawBasket();
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>