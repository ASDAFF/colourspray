<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?if (!CModule::IncludeModule('intec.startshop')) return;?>
<?
	function drawBasket() {
		global $APPLICATION;  
		
		$APPLICATION->IncludeComponent(
			"intec:startshop.basket.basket.small", 
			"mobile_header", 
			array(
				"DISPLAY_COUNT" => "Y",
				"DISPLAY_COUNT_IF_EMPTY" => "N",
				"DISPLAY_TOTAL" => "N",
				"CURRENCY" => "rub",
				"CART_URI" => SITE_DIR."cart/",
				"COMPONENT_TEMPLATE" => "mobile_header",
				"REQUEST_VARIABLE_ACTION" => "action",
				"REQUEST_VARIABLE_ITEM" => "item",
				"REQUEST_VARIABLE_QUANTITY" => "quantity",
				"URL_BASKET" => "/cart/",
				"USE_COUNT" => "Y",
				"USE_COUNT_IF_EMPTY" => "N",
				"USE_SUM" => "N"
			),
			$component
		);
		
		die();
	}
	
	if (!CStartShopBasket::InBasket($_REQUEST['CatalogBasketItem'], SITE_ID) || $_REQUEST['CatalogBasketAction']=='Delete') {
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