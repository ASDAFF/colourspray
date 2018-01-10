<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('services_orders.xml', 'feedback', 'unimagazinlite_services_orders', array(
		"FIELDS" => array(
			'CODE' => array(
				'IS_REQUIRED' => 'N',
				'DEFAULT_VALUE' => array(
					'UNIQUE' => 'N'
				)
			)
		)
	));
    
    $arVars = __getVars();
    $arVars['MACROS']['SERVICES_ORDERS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['SERVICES_ORDERS_IBLOCK_TYPE'] = 'feedback';
    __setVars($arVars);
?>