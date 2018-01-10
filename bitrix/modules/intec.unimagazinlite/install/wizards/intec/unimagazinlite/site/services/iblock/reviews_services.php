<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('reviews_services.xml', 'reviews', 'unimagazinlite_reviews_services', array(
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
    $arVars['MACROS']['REVIEWS_SERVICES_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['REVIEWS_SERVICES_IBLOCK_TYPE'] = 'reviews';
    __setVars($arVars);
?>