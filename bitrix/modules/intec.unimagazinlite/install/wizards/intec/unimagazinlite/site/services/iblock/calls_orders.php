<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('calls_orders.xml', 'feedback', 'unimagazinlite_calls_orders', array(
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
    $arVars['MACROS']['CALLS_ORDERS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['CALLS_ORDERS_IBLOCK_TYPE'] = 'feedback';
    __setVars($arVars);
?>