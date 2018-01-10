<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('reviews_catalog.xml', 'reviews', 'unimagazinlite_reviews_catalog', array(
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
    $arVars['MACROS']['REVIEWS_CATALOG_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['REVIEWS_CATALOG_IBLOCK_TYPE'] = 'reviews';
    __setVars($arVars);
?>