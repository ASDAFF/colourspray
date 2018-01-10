<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?if ($_REQUEST['action'] == 'addOneBuyClick' || $_REQUEST['action'] == 'fastOrder' ) {
	
	if (!CModule::IncludeModule('intec.startshop')) die();
	$codeName = strip_tags($arParams['PROP_NAME']);
	$codePhone = strip_tags($arParams['PROP_PHONE']);
	$codeComment = strip_tags($arParams['PROP_COMMENT']);
	
	$userName = strip_tags($arParams['USER_NAME']);
	$userPhone = strip_tags($arParams['USER_PHONE']);
	$userComment = strip_tags($arParams['USER_COMMENT']);
	
	$arPropCode = array($codeName, $codePhone, $codeComment);
	$arPropValue = array(
		$codeName => $userName,
		$codePhone => $userPhone,
		$codeComment => $userComment
	);
	$currency = $arParams['PRODUCT_CURRENCY'];
	
	if ($_REQUEST['action'] == 'addOneBuyClick') {
		if (empty($_REQUEST['PRODUCT_ID']) || empty($_REQUEST['USER_PHONE'])) die(GetMessage('OCB_ERROR'));
		$orderSum = 0;	
		
		$productID = strip_tags($arParams['PRODUCT_ID']);
		$productName = strip_tags($arParams['PRODUCT_NAME']);
		$productQuantity = strip_tags($arParams['PRODUCT_QUANTITY']);
		$productPrice = strip_tags($arParams['PRODUCT_PRICE']);
		$orderSum = $productPrice * $productQuantity;
		
		$arItemsOrder = array(
			$productID => array(
				'NAME' => $productName,
				'QUANTITY' => $productQuantity,
				'PRICE' => $productPrice
			)
		);
	} elseif ($_REQUEST['action'] == 'fastOrder') {
		if (empty($_REQUEST['USER_PHONE'])) die(GetMessage('OCB_ERROR'));
		
		$arItems = array();
		$arItemsOrder = array();
		$orderSum = 0;
		
		$res = CStartShopBasket::GetList(array(),array(),array(),array(), $currency,SITE_ID);
		
		while($el = $res->Fetch()) {
			$arItems[] = $el;
		}
		
		foreach($arItems as $arItem) {
			$arItemsOrder[$arItem['ID']]['NAME'] = $arItem['NAME'];
			$arItemsOrder[$arItem['ID']]['QUANTITY'] = $arItem['STARTSHOP']['BASKET']['QUANTITY'];
			$arItemsOrder[$arItem['ID']]['PRICE'] = $arItem['STARTSHOP']['BASKET']['PRICE']['VALUE'];
			
			$orderSum+= $arItem['STARTSHOP']['BASKET']['PRICE']['VALUE'] * $arItem['STARTSHOP']['BASKET']['QUANTITY'];
		}
	} 
		
	$arProps = CStartShopOrderProperty::GetList(array(), array('CODE' => $arPropCode, 'SID' => SITE_ID));
	
	$arPropsOrder = array();
	$arPropsOrderMail = array();
	
	while ($arProp = $arProps->Fetch()) {
		$arPropsOrder[$arProp['ID']] = $arPropValue[$arProp['CODE']];
		$arPropsOrderMail[$arProp['ID']]['NAME'] = $arProp['LANG'][LANGUAGE_ID]['NAME'];
		$arPropsOrderMail[$arProp['ID']]['VALUE'] = $arPropValue[$arProp['CODE']];
	}

	$arField = array(
		'SID' => SITE_ID,
		'CURRENCY' => $currency,
		'ITEMS' => $arItemsOrder,
		'PROPERTIES' => $arPropsOrder
	);

	$orderID = CStartShopOrder::Add($arField);

	if ($orderID) {
		if($_REQUEST['action'] == 'fastOrder') CStartShopBasket::Clear(SITE_ID);
		
		$arOrder = CStartShopOrder::GetById($orderID)->Fetch();
		
		$strOrderList = "";
		foreach ($arField['ITEMS'] as $val) {
			$strOrderList .= $val["NAME"]." - ".$val["QUANTITY"]." ".GetMessage("SOA_SHT").": ".CStartShopCurrency::FormatAsString(CStartShopCurrency::Convert($val["PRICE"] , $arField));
			$strOrderList .= "\n";
		}
		
		$strOrderProp = "";
				foreach ($arPropsOrderMail as $val)
				{
					$strOrderProp .= $val['NAME']." - ".$val['VALUE'];
					$strOrderProp .= "\n";
				}
		
		if (CStartShopVariables::Get('MAIL_USE', 'N', SITE_ID) == "Y") {
			if (CStartShopVariables::Get('MAIL_ADMIN_ORDER_CREATE', 'N', SITE_ID) == "Y") {
				$sEvent = CStartShopVariables::Get('MAIL_ADMIN_ORDER_CREATE_EVENT', '', SITE_ID);
				$sMail = CStartShopVariables::Get('MAIL_MAIL', '', SITE_ID);
				$oEvent = new CEvent();

				if (!empty($sEvent) && !empty($sMail))
					$oEvent->SendImmediate($sEvent, SITE_ID, array(
						"ORDER_ID" => $orderID,
						"ORDER_AMOUNT" => CStartShopCurrency::FormatAsString(CStartShopCurrency::Convert($orderSum , $arOrder['CURRENCY'])),
						"STARTSHOP_SHOP_EMAIL" => $sMail,
						"STARTSHOP_ORDER_LIST" => $strOrderList,
						"STARTSHOP_ORDER_PROPERTY" => $strOrderProp
					), "N", "");

				unset($oEvent);
			}
		}
		die ('success');
	} else {
		die (GetMessage('OCB_ERROR'));
	}
} else {
	$this->IncludeComponentTemplate();
}
?>